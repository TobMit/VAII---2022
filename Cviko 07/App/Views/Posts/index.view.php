<a  href="?c=posts&a=create" class="btn btn-succes">Pridať</a>

<?php
/** @var \App\Models\Post[] $data */
foreach ($data as $post) {

} ?> <div class="card my-3" style="width: 18rem;">

    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text"><?php echo $post->gettext()?></p>
        <a href="?c=posts&a=delete&id=<?php echo $post->getId() ?>" class="btn btn-danger">Zmaz</a>
        <a href="?c=posts&a=delete&id=<?php echo $post->getId() ?>" class="btn btn-warning">Edit</a>
    </div>
</div>

