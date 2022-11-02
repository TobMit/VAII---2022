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
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <title>Instac</title>
</head>
<body>

<div class="posts-container">
    <?php foreach ($db->getAllPos() as $post) { ?>
    <div class="post">
        <?php echo $post->text ?>
    </div>

    <?php } ?>
</div>

<div>
    <form method="post">
        <input type="text" name="text" placeholder="Tu napiš spravu">
        <input type="submit" value="Odoslať">
    </form>
</div>

</body>
</html>