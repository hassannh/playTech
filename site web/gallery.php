<?php
ob_start(); // Output Buffering Start 

session_start();

if (isset($_SESSION['Username'])) {
    $pageTitle = 'Gallery';
    include 'init.php';
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
        <div class="card" style="width: 18rem;">
            <div class="item_img">
                <img src="layout/image/items/r.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="btn" style="
                    display: flex;
                    gap: 10px;
                ">
                    <div class="item_buy">
                        <span class="item_price btn btn-primary">$15</span>
                        <i class="fa fa-cart-arrow-down btn btn-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="item_img">
                <img src="layout/image/items/r.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="btn" style="
                    display: flex;
                    gap: 10px;
                ">
                    <div class="item_buy">
                        <span class="item_price btn btn-primary">$15</span>
                        <i class="fa fa-cart-arrow-down btn btn-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="item_img">
                <img src="layout/image/items/r.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="btn" style="
                    display: flex;
                    gap: 10px;
                ">
                    <div class="item_buy">
                        <span class="item_price btn btn-primary">$15</span>
                        <i class="fa fa-cart-arrow-down btn btn-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="item_img">
                <img src="layout/image/items/r.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="btn" style="
                    display: flex;
                    gap: 10px;
                ">
                    <div class="item_buy">
                        <span class="item_price btn btn-primary">$15</span>
                        <i class="fa fa-cart-arrow-down btn btn-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="item_img">
                <img src="layout/image/items/r.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="btn" style="
                    display: flex;
                    gap: 10px;
                ">
                    <div class="item_buy">
                        <span class="item_price btn btn-primary">$15</span>
                        <i class="fa fa-cart-arrow-down btn btn-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="item_img">
                <img src="layout/image/items/r.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="btn" style="
                    display: flex;
                    gap: 10px;
                ">
                    <div class="item_buy">
                        <span class="item_price btn btn-primary">$15</span>
                        <i class="fa fa-cart-arrow-down btn btn-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="item_img">
                <img src="layout/image/items/r.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="btn" style="
                    display: flex;
                    gap: 10px;
                ">
                    <div class="item_buy">
                        <span class="item_price btn btn-primary">$15</span>
                        <i class="fa fa-cart-arrow-down btn btn-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="item_img">
                <img src="layout/image/items/r.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="btn" style="
                    display: flex;
                    gap: 10px;
                ">
                    <div class="item_buy">
                        <span class="item_price btn btn-primary">$15</span>
                        <i class="fa fa-cart-arrow-down btn btn-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="item_img">
                <img src="layout/image/items/r.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="btn" style="
                    display: flex;
                    gap: 10px;
                ">
                    <div class="item_buy">
                        <span class="item_price btn btn-primary">$15</span>
                        <i class="fa fa-cart-arrow-down btn btn-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="item_img">
                <img src="layout/image/items/r.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="btn" style="
                    display: flex;
                    gap: 10px;
                ">
                    <div class="item_buy">
                        <span class="item_price btn btn-primary">$15</span>
                        <i class="fa fa-cart-arrow-down btn btn-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="item_img">
                <img src="layout/image/items/r.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="btn" style="
                    display: flex;
                    gap: 10px;
                ">
                    <div class="item_buy">
                        <span class="item_price btn btn-primary">$15</span>
                        <i class="fa fa-cart-arrow-down btn btn-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="item_img">
                <img src="layout/image/items/r.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="btn" style="
                    display: flex;
                    gap: 10px;
                ">
                    <div class="item_buy">
                        <span class="item_price btn btn-primary">$15</span>
                        <i class="fa fa-cart-arrow-down btn btn-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
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
