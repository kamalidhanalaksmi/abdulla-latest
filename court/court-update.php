<?php
include_once "../includes/header.php";
if(isset($_POST['edit']))
{
    $court_name = mysqli_real_escape_string($conn, $_POST['court_name']);
    $court_no = mysqli_real_escape_string($conn, $_POST['court_no']);
    
  $query="UPDATE court SET 
    court_name='$court_name'
    WHERE court_no='$court_no'";

   $query_run=mysqli_query($conn,$query);
  if($query_run){

?>
        <script>
        alert("Successfully Updated")
        window.location.href='../court/?court_name=<?php echo $court_name;?>';
        </script>
<?php

}
else{
    ?>

        <script>
        alert(" Not Successfully Updated")
        window.location.href='update.php?court_no=<?php echo $court_no; ?>';
        </script> 

<?php
}
}
$result= mysqli_query($conn,"SELECT * FROM court where court_no='".$_GET['court_no']."'");

$row=mysqli_fetch_array($result);
?>

<html>
<head>
<title> Update data </title>
</head>
<body>
<form method="POST">

Court Name:<br>
<input type="text" name="court_name" value="<?php echo $row["court_name"];?>">
<br>


<input type="hidden" name="court_no" value="<?php echo $row["court_no"];?>">

<input type="submit" name="edit" id="edit" value="submit">

</body>

</html>