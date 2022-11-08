<form method="post" action="?c=posts&a=store">
    //ked editujeme mame id ak nie tak ide nemáme
    <?php /** @var \App\Models\Post $data */
    if($data->getId()) { ?>
        <input type="hidden" value="<?php  ?>">
    <?php }?>
    <label>
        text:
        <input type="text" name="text">
    </label>
    <input type="submint" value="Odoslať">
</form>
