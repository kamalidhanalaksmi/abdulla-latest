<?php
include_once "../includes/header.php";
if(isset($_POST['edit']))
{
    $case_status = mysqli_real_escape_string($conn, $_POST['case_status']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
  $query="UPDATE status SET 
    case_status='$case_status'
    WHERE id='$id'";

   $query_run=mysqli_query($conn,$query);
  if($query_run){

?>
        <script>
        alert("Successfully Updated")
        window.location.href='../status/?case_status=<?php echo $case_status;?>';
        </script>
<?php

}
else{
    ?>

        <script>
        alert(" Not Successfully Updated")
        window.location.href='update.php?id=<?php echo $id; ?>';
        </script> 

<?php
}
}
$result= mysqli_query($conn,"SELECT * FROM status where id='".$_GET['id']."'");

$row=mysqli_fetch_array($result);
?>

<html>
<head>
<title> Update data </title>
</head>
<body>
<form method="POST">

Case status:<br>
<input type="text" name="case_status" value="<?php echo $row["case_status"];?>">
<br>


<input type="hidden" name="id" value="<?php echo $row["id"];?>">

<input type="submit" name="edit" id="edit" value="submit">

</body>

</html>