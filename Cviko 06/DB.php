<?php

class DB
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct()
    {
        //tuto musí byť namiesto localhost iba db pretože docker-compose.yml hovorí že je prístup k databáze cez db
        $this->pdo = new PDO('mysql:host=db;dbname=instac', "root", "heslo");
    }

    //toto sa sem musí pridať aby to vedel auto complete rozpoznávalo a nerobilo problémi
    /**
     * @return Post[]
     */
    public function getAllPos()
    {
        $stm = $this->pdo->query("SELECT * FROM posts");

        return $stm->fetchAll(PDO::FETCH_CLASS, Post::class);
    }

    public function storePost(Post $post)
    {
        $sql = "INSERT INTO posts (text) VALUES (?)";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$post->text]);
    }

}