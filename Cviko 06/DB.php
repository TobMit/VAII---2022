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
        $sql = "INSERT INTO posts (text, file) VALUES (?, ?)";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$post->text, $post->file]);
    }

    public function remove($id)
    {
        $stm = $this->pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stm->execute([$id]);
        //budeme sa spoliehať že to vráti iba jeden záznam

        /** @var Post $vysledok */
        $vysledok = $stm->fetchAll(PDO::FETCH_CLASS, Post::class)[0];

        if ($vysledok->file) {
            unlink($vysledok->file);
        }


        $sql = "DELETE FROM posts WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

}