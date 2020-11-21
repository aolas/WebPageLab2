<?php
// If there is no constant defined called __CONFIG__, do not load this file
if(!defined('__CONFIG__')) {
    exit('You do not have a config file');
}


class Comment
{
    private $con;

    public $comment_id;
    public $user_id;
    public $article_id;
    public $comment;
    public $publication_time;

    public function __construct(int $comment_id) {
        $this->con = DB::getConnection();

        $comment_id = Filter::Int( $comment_id );

        $getComment = $this->con->prepare("SELECT * FROM comments WHERE comment_id = :comment_id LIMIT 1");
        $getComment->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
        $getComment->execute();

        if($getComment->rowCount() == 1) {
            $comment = $getComment->fetch(PDO::FETCH_OBJ);

            $this->comment_id		= (int) $comment->comment_id;
            $this->user_id		= (int) $comment->user_id;
            $this->article_id 		= (int) $comment->article_id;
            $this->comment        = (string)$comment->comment;
            $this->publication_time 	= (string) $comment->publication_time;
        } else {
            // No article.
            // Redirect to to gome.
            header("Location: /index.php"); exit;
        }
    }
    public static function addComment( $article_id,$comment_text) {

//        DELETE FROM books WHERE author_id = '2034';
        $connectin = DB::getConnection();
        $user_id = Page::currentUser();
        $article_id = Filter::Int( $article_id );
        $comment_text = Filter::String($comment_text);
        $return = [];

        try {
            $addComment = $connectin->prepare("INSERT INTO comments (user_id, article_id, comment) VALUES(:user_id, :article_id, :comment)");
            $addComment->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $addComment->bindParam(':article_id', $article_id, PDO::PARAM_INT);
            $addComment->bindParam(':comment', $comment_text, PDO::PARAM_STR);
            $addComment->execute();
            $return['status'] = 'Request compleated';
            $return ['redirect'] = "/readarticle.php?article=".$article_id;
        } catch (PDOException $e){
            $return['error']="Request error";
        }
        return $return;
    }
    public static function getCommentsByArticle($article_id) {
        $connectin = DB::getConnection();
        $article_id = Filter::Int( $article_id );
        $return = [];
        try{
            $getComments = $connectin->prepare("SELECT * FROM comments WHERE article_id = :article_id");
            $getComments->bindParam(':article_id', $article_id, PDO::PARAM_INT);
            $getComments->execute();
            return $getComments->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e){
            return null;
        }

    }
    public static function numberOfCommentsByArticle($article_id) {
        $connectin = DB::getConnection();
        $article_id = Filter::Int( $article_id );
        $return = [];
        try{
            $getCount = $connectin->prepare("SELECT comment_id FROM comments WHERE article_id = :article_id");
            $getCount->bindParam(':article_id', $article_id, PDO::PARAM_INT);
            $getCount->execute();
            return $getCount->rowCount();

        } catch (PDOException $e){
            return null;
        }

        //SELECT COUNT(*) FROM articles;
    }
}
?>