<?php

include "Post.php";
include "DB.php";

$db = new DB();

?> <html>
<head>


</head>
<body>

<div class="posts-container">
    jjflajldjfa
    <?php foreach ($db->getAllPos() as $post) { ?>
    <div class="post">
        <?php $post->text ?>
    </div>

    <?php } ?>
</div>

</body>
</html>