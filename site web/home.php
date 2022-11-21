<?php
ob_start(); // Output Buffering Start 

session_start();

if (isset($_SESSION['Username'])) {
    $pageTitle = 'Home';
    include 'init.php';
    /* Start Home Page */
?>



<div>
    <img class="backgrouandtech" src="layout/image/PT-Hero-Animated.gif" alt="gamesbackgrouand">
</div>


<div style="padding: 20px;"class="aboutU">
    <div class="aboutU-img">
        <img src="layout/image/home-block1.png" alt="storPic">
    </div>
    <div class="aboutU-desc">
        <span><b>PlayPech</b></span>
        <p>Playtech is a market leader
             in the gambling and financial 
             trading industries. We are the world's 
             largest online gambling software supplier 
             offering cutting-edge ...</p>

    </div>
</div>


<div style="padding: 20px;" class="aboutU Manager">
    <div class="aboutU-desc">
        <span><b>What Our Manager Said</b></span>
        <p>Lorem, ipsum dolor sit amet
             consectetur adipisicing elit.
              Illum perferendis amet earum 
              consequatur accusamus voluptatibus
               illo at officia molestiae voluptatem
                placeat cupiditate sit quia soluta explicabo
                 rem aspernatur, consequuntur vero!</p>
    </div>
    <div class="aboutU-img">
    <img src="layout/image/pexels-sora-shimazaki-5669638.jpg" alt="">
    </div>
</div>


<div class="service_title">
    <h2>Our Services</h2>
</div>
<div class="services">
    <div class="service Add">
        <i class="fa fa-plus"></i><br>
        <span><b>Add Item</b></span>
        <p>
            Lorem ipsum dolor,
            sit amet consectetur
            adipisicing elit. Tenetur
            tempora culpa non. Cum 
            quibusdam, iste assumenda, 
            voluptatem maiores perferendis 
            ratione, eaque deleniti
            eius debitis quam adipisci
            dolor rem deserunt molestias.
            
        </p>

    </div>
    <div class="service Edit">
    <i class="fa fa-edit"></i><br>
        <span><b>Edit Item</b></span>
        <p>
            Lorem ipsum dolor,
            sit amet consectetur
            adipisicing elit. Tenetur
            tempora culpa non. Cum 
            quibusdam, iste assumenda, 
            voluptatem maiores perferendis 
            ratione, eaque deleniti
            eius debitis quam adipisci
            dolor rem deserunt molestias.
            
        </p>

    </div>
    <div class="service Delete">
    <i class="fa fa-close"></i><br>
        <span><b>Delete Item</b></span>
        <p>
            Lorem ipsum dolor,
            sit amet consectetur
            adipisicing elit. Tenetur
            tempora culpa non. Cum 
            quibusdam, iste assumenda, 
            voluptatem maiores perferendis 
            ratione, eaque deleniti
            eius debitis quam adipisci
            dolor rem deserunt molestias.
            
        </p>

    </div>
    <div class="service Buy">
    <i class="fa fa-shopping-cart" aria-hidden="true"></i><br>
        <span><b>Buy Item</b></span>
        <p>
            Lorem ipsum dolor,
            sit amet consectetur
            adipisicing elit. Tenetur
            tempora culpa non. Cum 
            quibusdam, iste assumenda, 
            voluptatem maiores perferendis 
            ratione, eaque deleniti
            eius debitis quam adipisci
            dolor rem deserunt molestias.
            
        </p>

    </div>
   
</div>


<?php    /* End Home Page */

include 'tmp/footer.php';
include 'tmp/script.php';
} else {

    header('Location: index.php');

    exit();
}

ob_end_flush(); // Release The Output

?>

