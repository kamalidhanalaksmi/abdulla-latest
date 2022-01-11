<?php
include_once "../includes/header.php";
if(isset($_POST['edit']))
{
    $case_type_tittle = mysqli_real_escape_string($conn, $_POST['case_type_tittle']);
    $case_type_id= mysqli_real_escape_string($conn, $_POST['case_type_id']);
    
  $query="UPDATE case_type SET 
    case_type_tittle= '$case_type_tittle'
    WHERE case_type_id= '$case_type_id'";

   $query_run=mysqli_query($conn,$query);
  if($query_run){

?>
        <script>
        alert("Successfully Updated")
        window.location.href='../status/?case_type_tittle=<?php echo $case_type_tittle;?>';
        </script>
<?php

}
else{
    ?>

        <script>
        alert(" Not Successfully Updated")
        window.location.href='update.php?case_type_id=<?php echo $case_type_id; ?>';
        </script> 

<?php
}
}
$result= mysqli_query($conn,"SELECT * FROM case_type where case_type_id='".$_GET['case_type_id']."'");

$row=mysqli_fetch_array($result);
?>

<html>
<head>
<title> Update data </title>
</head>
<body>
<form method="POST">

Case Type:<br>
<input type="text" name="case_type_tittle" value="<?php echo $row["case_type_tittle"];?>">
<br>

<input type="hidden" name="case_type_id" value="<?php echo $row["case_type_id"];?>">

<input type="submit" name="edit" id="edit" value="submit">

</body>

</html>