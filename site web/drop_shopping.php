<?php
include 'init.php';
include 'tmp/head.php';
include 'tmp/navbar.php';
?>

<h1 class="drop_title">
    Put Your Items Here
</h1>
<form class="add_item">
    <div class="item">
        <label class="input-group-text label_item" for="name_item">Nom de produit</label>
        <input class="input_item" type="text" name="name_item">
    </div>
    <div class="item">
        <label class="input-group-text label_item" for="desc_item">Description de produit</label>
        <input class="input_item" type="text" name="desc_item">
    </div>
    <div class="item">
        <label class="input-group-text label_item" for="prix_item">Prix de produit</label>
        <input class="input_item" type="text" name="prix_item">
    </div>   
    <div class="item">
        <label class="input-group-text label_item file" for="img_item">Image de produit</label>
        <input class="form-control input_item" type="file" name="img_item">
    </div>
    <div class="submit_add">
        <i class="fa fa-plus add_plus"></i>
        <input class="input-group-text input_submit" type="submit" value="  Ajouter le produit">
    </div>
</form>

<?php
include 'tmp/footer.php';
include 'tmp/script.php';
?>