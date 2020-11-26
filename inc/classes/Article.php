<?php

// If there is no constant defined called __CONFIG__, do not load this file
if(!defined('__CONFIG__')) {
    exit('You do not have a config file');
}


class Article {

    private $con;

    public $article_id;
    public $user_id;
    public $title;
    public $article_text;
    public $publication_time;

    public function __construct(int $article_id) {
        $this->con = DB::getConnection();

        $article_id = Filter::Int( $article_id );

        $article = $this->con->prepare("SELECT article_id, user_id, title, article_text, publication_time FROM articles WHERE article_id = :article_id LIMIT 1");
        $article->bindParam(':article_id', $article_id, PDO::PARAM_INT);
        $article->execute();

        if($article->rowCount() == 1) {
            $article = $article->fetch(PDO::FETCH_OBJ);

            $this->article_id		= (int) $article->article_id;
            $this->user_id 		= (int) $article->user_id;
            $this->title        = (string)$article->title;
            $this->article_text        = (string)$article->article_text;
            $this->publication_time 	= (string) $article->publication_time;
        } else {
            // No article.
            // Redirect to to gome.
            header("Location: /index.php"); exit;
        }
    }
    public static function addNewArticles($title,$articleText){
        $return = [];
        if(strlen ($articleText) > 0 && strlen ($title)> 0 ) {
            $title = Filter::String($title);
            $userId = Page::currentUser();
            $con = DB::getConnection();
            $wordcount = count(preg_split('~[^\p{L}\p{N}\']+~u',$articleText));
            try{
                $addArticle = $con->prepare("INSERT INTO articles(title, article_text,wordcount, user_id) VALUES(:title, :article_text,:wordcount, :user_id)");
                $addArticle->bindParam(':title', $title, PDO::PARAM_STR);
                $addArticle->bindParam(':article_text', $articleText, PDO::PARAM_STR);
                $addArticle->bindParam(':user_id', $userId, PDO::PARAM_INT);
                $addArticle->bindParam(':wordcount', $wordcount, PDO::PARAM_INT);
                $addArticle->execute();
                $return['status']= "Article added";
            } catch (PDOException $e){
                $return['error']="Request error";
            }
        } else{
            $return['error']= "Can't be emty title or article field";
        }
        return $return;
    }

    public static function getArticles() {
        $connectin = DB::getConnection();
        $articles = $connectin->prepare("SELECT article_id, user_id, title, SUBSTRING(article_text,1,200) as article_text , publication_time FROM articles"); //ORDER BY publication_time DESC");
        $articles->execute();
        return $articles->fetchAll(PDO::FETCH_OBJ);
    }
    public static function getByUserArticles($user_id) {
        $connectin = DB::getConnection();
        $user_id = Filter::Int($user_id);
        try{
            $articles = $connectin->prepare("SELECT article_id, title, wordcount,  publication_time FROM articles WHERE user_id=:user_id ");
            $articles->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $articles->execute();
        } catch (PDOException $e){

        }

        return $articles->fetchAll(PDO::FETCH_OBJ);
    }
    public static function removeArticle($article_id ) {

//        DELETE FROM books WHERE author_id = '2034';
        $connectin = DB::getConnection();
        $article_id = Filter::Int( $article_id );
        $return = [];
        try {
            $deleteArticle = $connectin->prepare("DELETE FROM articles WHERE article_id=:article_id");
            $deleteArticle->bindParam(':article_id', $article_id, PDO::PARAM_INT);
            $deleteArticle->execute();
            $return['status'] = 'Request compleated';
        } catch (PDOException $e){
            $return['error']="Request error";
        }
        return $return;
    }
    public static function changeArticle($article_id,$title,$article_text) {

//        DELETE FROM books WHERE author_id = '2034';
        $connectin = DB::getConnection();
        $article_id = Filter::Int( $article_id );
        $title = Filter::String($title);
        //$article_text = Filter::String($article_text);

        $wordcount = count(preg_split('~[^\p{L}\p{N}\']+~u',$article_text));
        $return = [];

        try {
            $updateArticle = $connectin->prepare("UPDATE articles SET title=:title,article_text=:article_text,wordcount=:wordcount  WHERE article_id=:article_id");
            $updateArticle->bindParam(':article_text', $article_text, PDO::PARAM_STR);
            $updateArticle->bindParam(':title', $title, PDO::PARAM_STR);
            $updateArticle->bindParam(':article_id', $article_id, PDO::PARAM_INT);
            $updateArticle->bindParam(':wordcount', $wordcount, PDO::PARAM_INT);
            $updateArticle->execute();
            $return['status'] = 'Request compleated';
        } catch (PDOException $e){
            $return['error']="Request error";
        }
        return $return;
    }
    public static function articleStats() {
        $connectin = DB::getConnection();
        $return = [];
        try{
            $getCount = $connectin->prepare("SELECT article_id FROM articles");
            $getCount->execute();
            //SELECT SUM(column_name) FROM table_name WHERE condition;
            $return['rowCount']= $getCount->rowCount();
            $getCount = $connectin->prepare("SELECT SUM(wordcount) AS wordcount_sum FROM articles");
            $getCount->execute();
            $row = $getCount->fetch(PDO::FETCH_ASSOC);
            $return['wordcount_sum']= $row['wordcount_sum'];
            $return['status'] = 'Request compleated';
        } catch (PDOException $e){
            $return['error']="Request error";
        }
        return $return;
        //SELECT COUNT(*) FROM articles;
    }

}
?>
