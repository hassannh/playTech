<?php
ob_start(); // Output Buffering Start 

session_start();

if (isset($_SESSION['Username'])) {
    $pageTitle = 'Gallery';
    include 'init.php';
    //select items in Data Base
    //depart
    $stmt = $con->prepare("SELECT * FROM  items ");

    // Execute The Statement

    $stmt->execute();

    // Assign To Variable

    $items = $stmt->fetchAll();

?>
            <!-- Start Gallery Page -->
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
        foreach ($items as $item) {
            echo '<div class="card All ' . $item['categories'] . '"  style="width: 18rem;">';
                echo '<div class="item_img">';
                    echo '<img src="layout/image/items/' . $item['Image'] . '" class="card-img-top" alt="item">';
                echo '</div>';
                echo '<div class="item_img">';
                    echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $item['Name'] . '</h5>';
                        echo '<p class="card-text">' . $item['Description'] . '</p>';
                        echo '<div class="btn item_buy" style=" display: flex; gap: 10px; ">';
                            echo '<span class="item_price btn btn-primary">' . $item['Price'] . '</span>';
                            echo '<i onclick=\'alert("you buy a ' . $item['Name'] . ' with ' . $item['Price'] . '  your item will delevred!!")\' class="fa fa-cart-arrow-down btn btn-primary" id="' . $item['Item_ID'] .' " aria-hidden="true"></i>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    ?>
    </div>
</div>

<?php /* End Gallery Page */

    include 'tmp/footer.php';
    include 'tmp/script.php';
} else {

    header('Location: index.php');

    exit();
}

ob_end_flush(); // Release The Output

?>
