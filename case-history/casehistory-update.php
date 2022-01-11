<?php
include_once "../includes/header.php";
if(isset($_POST['edit']))
{
    $stage_id = mysqli_real_escape_string($conn, $_POST['stage_id']);
    $appeared_by = mysqli_real_escape_string($conn, $_POST['appeared_by']);
    $status= mysqli_real_escape_string($conn, $_POST['status']);
    $next_stage = mysqli_real_escape_string($conn, $_POST['next_stage']);
    $appeared_date = mysqli_real_escape_string($conn, $_POST['appeared_date']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
  // have to check
  $query="UPDATE case_history SET 
    stage_id='$stage_id',
    appeared_by='$appeared_by',
    status='$status',
    next_stage='$next_stage',
    appeared_date='$appeared_date',
    note='$note'
    WHERE id='$id'";

    //

$query_run=mysqli_query($conn,$query);

if($query_run){

?>
    <script>
    alert("Successfully Updated")
    window.location.href='../case-history/?case_no=<?php echo $case_no;?>';
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
$result= mysqli_query($conn,"SELECT * FROM case_history where id='".$_GET['id']."'");

$updaterow=mysqli_fetch_array($result);
?>

<html>
<head>
<title> Update data </title>
</head>
<body>
<form method="POST">

<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">

Stage :
        <select name="stage_id" id="stage_id">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM stages WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option <?php if ($updaterow['stage_id']==$row["stage_no"]) {echo "selected";} ?> 
             value="<?php echo $row["stage_no"];?>">
             <?php echo $row["stage_name"];?></option>
        <?php
            }
        }
        else{
        ?>
            <option value="">No Data</option>
        <?php
        }
        ?>
        </select><br><br>

Appeared By :
       <select name="appeared_by" id="appeared_by">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM employee WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>

            <option

            <?php if ($updaterow['appeared_by']==$row["id"]) {echo "selected";} ?> 
     value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
        <?php
            }
        }
        else{
        ?>
            <option value="">No Data</option>
        <?php
        }
        ?>
        </select><br><br>

Status :
       <select name="case_status" id="case_status">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM status WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option
            <?php if ($updaterow['status']==$row["id"]) {echo "selected";} ?> 
      value="<?php echo $row["id"];?>"><?php echo $row["case_status"];?></option>
        <?php
            }
        }
        else{
        ?>
            <option value="">No Data</option>
        <?php
        }
        ?>
        </select><br><br>


Next Stage :
       <select name="next_stage" id="next_stage">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM stages WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option
            <?php if ($updaterow['next_stage']==$row["stage_no"]) {echo "selected";} ?> 
         value="<?php echo $row["stage_no"];?>"><?php echo $row["stage_name"];?></option>
        <?php
            }
        }
        else{
        ?>
            <option value="">No Data</option>
        <?php
        }
        ?>
        </select><br><br>

Appeared Date:
<input type ="date" name="appeared_date" value="<?php echo $row["appeared_date"];?>">
<br><br>

Note :
<textarea id="note" name="note" rows="4" cols="20"></textarea><br><br>


<input type="submit" name="edit" id="edit" value="submit">

</body>

</html>