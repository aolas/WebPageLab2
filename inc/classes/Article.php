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
    public $reg_time;

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
            $this->reg_time 	= (string) $article->reg_time;
        } else {
            // No user.
            // Redirect to to logout.
            header("Location: /logout.php"); exit;
        }
    }

    public static function getArticles() {
        $connectin = DB::getConnection();
        $articles = $connectin->prepare("SELECT article_id, title, publication_time FROM articles");
        $articles->execute();
        return $articles->fetchAll();
    }


//    public static function Find($email, $return_assoc = false) {
//
//        $con = DB::getConnection();
//
//        $email = (string) Filter::String( $email );
//
//        $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
//        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
//        $findUser->execute();
//
//
//        if($return_assoc) {
//            return $findUser->fetch(PDO::FETCH_ASSOC);
//        }
//
//        $user_found = (boolean) $findUser->rowCount();
//        return $user_found;
//    }


}
?>