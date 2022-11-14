<?php
    include 'init.php';
    include 'tmp/head.php';
    include 'tmp/navbar.php';
?>

<div class="gallery">
    <div class="select">
        <span><b>All</b></span>
        <span><b>Games</b></span>
        <span><b>Mouses</b></span>
        <span><b>KeyBoards</b></span>
        <span><b>Screen</b></span>
        <span><b>Central Units</b></span>
    </div>
    <div class="items">
        <div class="item">
            <div class="item_img"><img src="layout/image/remote.jpg" alt=""></div>
            <div class="item_desc">
                <span class="item_title"><b>Manette</b></span>
                <div class="item_buy">
                    <span class="item_price">$15</span>
                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include 'tmp/footer.php';
    include 'tmp/script.php';
?>