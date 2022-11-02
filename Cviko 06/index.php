<?php

include "Post.php";
include "DB.php";

$db = new DB();

if (isset($_POST['text'])) {
    $newPost = new Post();
    $newPost->text = $_POST['text'];
    $db->storePost($newPost);
}

?> <html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Instac</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="offset-4 col-4">
            <div class="posts-container m-4">
                <?php foreach ($db->getAllPos() as $post) { ?>
                    <div class="card mb-4" style="width: 18rem;">
<!--                        <img src="..." class="card-img-top" alt="...">-->
                        <div class="card-body">
<!--                            <h5 class="card-title">Card title</h5>-->
                            <p class="card-text"><?php echo $post->text ?></p>
<!--                            <a href="#" class="btn btn-primary">Go somewhere</a>-->
                        </div>
                    </div>

                <?php } ?>
            </div>

            <div>
                <form method="post">
                    <input type="text" name="text" placeholder="Tu napiš spravu">
                    <input type="submit" value="Odoslať">
                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>