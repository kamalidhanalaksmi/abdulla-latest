<?php
include_once "../includes/header.php";
if(isset($_POST['edit']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
// have to check
  $query="UPDATE employee SET 
    name='$name'
    WHERE id='$id'";
//

$query_run=mysqli_query($conn,$query);

if($query_run){

?>
<script>
alert("Successfully Updated")
window.location.href='../employee';
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
$result= mysqli_query($conn,"SELECT * FROM employee where id='".$_GET['id']."'");

$row=mysqli_fetch_array($result);
?>

<html>
<head>
<title> Update data </title>
</head>
<body>
<form method="POST">


<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
Name :<br>
<input type="text" name="name" value="<?php echo $row["name"];?>">
<br>

<input type="submit" name="edit" id="edit" value="submit">

</body>

</html>