
<!-- include nav footer and styles ,js and database -->
<?php
    include 'init.php';
    $title = 'playtech';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title ?></title>
    <link rel="stylesheet" href="layout/css/style.css">
    <link rel="stylesheet" href="layout/css/bootstrap.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" integrity="sha512-XJ3ntWHl40opEiE+6dGhfK9NAKOCELrpjiBRQKtu6uJf9Pli8XY+Hikp7rlFzY4ElLSFtzjx9GGgHql7PLSeog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include $temp . 'navbar.php' ?>
    
    <?php include $temp . 'footer.php' ?>
    <script src="layout/JAVAscript/script.js"></script>
    <script src="layout/JAVAscript/bootstrap.js"></script>
    <script src="layout/JAVAscript/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>