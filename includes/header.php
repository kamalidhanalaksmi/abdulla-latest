<?php

include_once "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .sidenav {
        height: 100%;
        width: 160px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
}
    </style>
</head>
<body>
<?php if ( $_SESSION['is_logged_in'] == 1) {?>
<div class="sidenav">
  <a href="../enquiry/">Enquiry</a><br><br>
  <a href="../case-master/">Case Master</a><br><br>
  <a href="../employee/">Employee</a><br><br>
  <a href="../enquiry-status/">Enquiry Status</a><br><br>
  <a href="../court/">Court</a><br><br>
  <a href="../status/">Status</a><br><br>


</div>
<?php } ?>
</body>