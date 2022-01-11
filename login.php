<?php
$to_check_user = "0";
$page_title = 'Login';
require_once "includes/header.php";
$error = "";
$myusername = "";
// username and password sent from form 
if (isset($_POST['username']) && isset($_POST['password'])) {
    $myusername = mysqli_real_escape_string($conn, $_POST['username']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT id FROM users WHERE user_name = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;

        echo '<script>window.location="dashboard/";</script>';
    } else {
        $error = "Your Login Mail or Password is invalid";
    }
}
?>
<form class="mt-4" method="POST">
    <label class="text-dark" for="uname">Username</label>
    <input class="form-control" id="uname" name="username" type="text"
        placeholder="enter your username">
    <label class="text-dark" for="pwd">Password</label>
    <input class="form-control" id="pwd" name="password" type="password"
        placeholder="enter your password">
    <button type="submit" class="btn btn-block btn-dark">Sign In</button>
        
</form>
<?php require_once "includes/footer.php"?>
