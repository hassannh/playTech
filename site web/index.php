<?php
    include 'init.php';
    include 'tmp/head.php';
?>

<form class="login" action="home.php">
    <label for="email">Email</label>
    <input type="email" name="email">
    <label for="password">Password</label>
    <input type="password" name="password">
    <input type="submit" value="log in" class="btn btn-primary submit">
</form>

<?php
    include 'tmp/script.php';
?>