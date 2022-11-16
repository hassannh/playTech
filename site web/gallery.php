<?php
ob_start(); // Output Buffering Start 

session_start();

if (isset($_SESSION['Username'])) {
    $pageTitle = 'Gallery';
    include 'init.php';
    // select items from database
    $statment = $con->prepare("SELECT * FROM items");
    $statment -> execute();
    $items = $statment -> fetchAll();
    /* Start Gallery Page */
?>

<div class="gallery">
        <select id="category" class="form-select select" multiple aria-label="multiple select example">
                <option class="select_op" value="All" selected>All</option>
                <option class="select_op" value="Games">Games</option>
                <option class="select_op" value="Mouses">Mouses</option>
                <option class="select_op" value="KeyBoards">KeyBoards</option>
                <option class="select_op" value="Screen">Screen</option>
                <option class="select_op" value="Control">Remote control</option>
            </select>
    <div class="items">
    <?php
        foreach($items as $item){
            echo '<div class="card Control" style="width: 18rem;">';
                echo '<div class="item_img">';
                    echo '<img src="layout/image/items/r.jpg" class="card-img-top" alt="...">';
                echo '</div>';
                echo '<div class="card-body">';
                    echo '<h5 class="card-title">Card title</h5>';
                    echo '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>';
                    echo '<div class="btn" style=" display: flex; gap: 10px; ">';
                        echo '<div class="item_buy">';
                            echo '<span class="item_price btn btn-primary">$15</span>';
                            echo '<i class="fa fa-cart-arrow-down btn btn-primary" aria-hidden="true"></i>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    ?>
    </div>
</div>


<?php    /* End Gallery Page */

include 'tmp/footer.php';
include 'tmp/script.php';
} else {

    header('Location: index.php');

    exit();
}

ob_end_flush(); // Release The Output

?>
