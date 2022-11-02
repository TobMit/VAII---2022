<?php

class DB
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=instac', "root", "heslo");
    }

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