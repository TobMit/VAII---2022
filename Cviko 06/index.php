<?php

include "Post.php";
include "DB.php";

$db = new DB();

if (isset($_POST['text'])) {
    $newPost = new Post();
    $newPost->text = $_POST['text'];

    if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK){  //kotnrolujeme či sa spárvne nahral súbor
        $newName = "img" . DIRECTORY_SEPARATOR . time() . "_" . $_FILES["img"]["name"]; // dávame súboru prefix, aby nedošlo ku kolízií
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $newName)) {
            $newPost->file = $newName;
        }
    }

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
                    <div class="card mb-4">
                        <?php if ($post->file) { ?>
                        <img src="<?php echo $post->file?>" class="card-img-top" alt="...">
                        <?php } ?>
                        <div class="card-body">
<!--                            <h5 class="card-title">Card title</h5>-->
                            <p class="card-text"><?php echo $post->text ?></p>
<!--                            <a href="#" class="btn btn-primary">Go somewhere</a>-->
                        </div>
                    </div>

                <?php } ?>
            </div>

            <div>
                <!-- musí tam byť multipar inak by sa request neoddeli od textových častí -->
                <form method="post" enctype="multipart/form-data">

                    <input type="text" name="text" placeholder="Tu napiš spravu">
                    <input type="file" name="img">

                    <input type="submit" value="Odoslať">
                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>