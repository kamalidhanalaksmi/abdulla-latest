<?php
include_once "../includes/header.php";
if(isset($_POST['edit']))
{
    $enquiry_status = mysqli_real_escape_string($conn, $_POST['enquiry_status']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
  $query="UPDATE enquiry_status SET 
    enquiry_status='$enquiry_status'
    WHERE id='$id'";

   $query_run=mysqli_query($conn,$query);
  if($query_run){

?>
        <script>
        alert("Successfully Updated")
        window.location.href='../enquiry-status/?enquiry_status=<?php echo $enquiry_status;?>';
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
$result= mysqli_query($conn,"SELECT * FROM enquiry_status where id='".$_GET['id']."'");

$row=mysqli_fetch_array($result);
?>

<html>
<head>
<title> Update data </title>
</head>
<body>
<form method="POST">

Enquiry Status:<br>
<input type="text" name="enquiry_status" value="<?php echo $row["enquiry_status"];?>">
<br>


<input type="hidden" name="id" value="<?php echo $row["id"];?>">

<input type="submit" name="edit" id="edit" value="submit">

</body>

</html>