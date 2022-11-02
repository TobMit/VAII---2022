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