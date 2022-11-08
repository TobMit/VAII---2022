<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use Post;

class PostsControllers extends AControllerBase
{

    public function authorize($action)
    {
        switch ($action) {
            case "delete":
            case "edit":
            case "create":
            case "store":
                return true;

        }
    }

    public function index()
    {
        $posts = Post::getAll();
        return $this->html($posts);
    }

    public function delete()
    {
        $id = $this->request()->getValue('id');
        $postToDelete = Post::getOne($id);
        $postToDelete->delete();

        return $this->redirect("?c=paths");
    }

    public function create()
    {
        return $this->html(new Post());
    }

    public function store()
    {
        $post = new Post();
        $post->setText($this->request()->getValue('text'));
        $post->save();

        return $this->redirect("?c=posts");
    }

    public function edit()
    {
        $id = $this->request()->getValue('id');
        $post = Post::getOne($id);

        return $this->html($post, 'create'); // doplní k názvu view.php a bude to tam vyhladavať
    }

    public function liked()
    {
        $id = $this->request()->getValue('id');
        $post = Post::getOne($id);
        /** @var Like $like */
        foreach ($post->getLikes as $like) {
            if ($like->getUser() == $this->app->getAuth()->getLoggedUserName()) {
                //$like
            }x
        }

        return $this->html($post, 'create'); // doplní k názvu view.php a bude to tam vyhladavať
    }
}