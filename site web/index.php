<?php
//to execute everything
session_start();

$noNavbar = '';
$pageTitle = 'Login';

if (isset($_SESSION['Username'])) {
    header('Location: home.php'); // go To Home page
}
include 'init.php';
// Check If User Coming From HTTP Post Request

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['user'];
    $password = $_POST['pass'];

    //Check If The User Exist In Database

    $stmt = $con->prepare("SELECT 
                                    UserID, Username, Password
                                FROM
                                    users
                                WHERE 
                                    Username = ? 
                                AND
                                    Password = ? 
                                LIMIT 1");
    $stmt->execute(array($username, $password));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();

    // If Count > 0 This Mean The Database Contain Record About This Username
    if ($count > 0) {
        $_SESSION['Username'] = $username; // Register Session Name
        $_SESSION['ID'] = $row['UserID']; // Register Session ID
        header('Location: home.php'); // Redirect To home page
        exit();
    }
}
//action :last thing you bring from database
?>

<form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <label for="user">Username</label>
    <input type="text" name="user" autocomplete="off">
    <label for="pass">Password</label>
    <input type="password" name="pass" autocomplete="new-password">
    <input type="submit" value="log in" class="btn btn-primary submit">
</form>

<?php
include 'tmp/script.php';
?>