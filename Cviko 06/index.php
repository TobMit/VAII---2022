<?php

include "Post.php";
include "DB.php";

$db = new DB();

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
    <form>
        <input type="text" name="text" placeholder="Tu napiš spravu">
        <input type="submit" value="Odoslať">
    </form>
</div>

</body>
</html>