<?php
require 'config.php';
session_start();
$_SESSION['is_logged_in'] = 0;

if ((isset($to_check_user) && $to_check_user != 0) || !isset($to_check_user)) {
    $user_check = $_SESSION['login_user'];

    $ses_sql = mysqli_query($conn, "select * from users where user_name  = '$user_check' ");
    if ($ses_sql) {
        $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

        $login_session = $row['name'];
        $user_id = $row['id'];

        $_SESSION['is_logged_in'] = 1;
    }


    if (!isset($_SESSION['login_user'])) {
        if (session_destroy()) {
            header("Location: ../login.php");
        }
    }
}
