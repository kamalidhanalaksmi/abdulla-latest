<?php
include_once "../includes/header.php";
$caseno= $_GET["case_no"];
if(isset($_POST['edit']))
{
    $case_no = mysqli_real_escape_string($conn, $_POST['case_no']);

    $enquiry_no = mysqli_real_escape_string($conn, $_POST['enquiry_no']);

    $court_no = mysqli_real_escape_string($conn, $_POST['court_no']);

    $case_type = mysqli_real_escape_string($conn, $_POST['case_type']);

    $year = mysqli_real_escape_string($conn, $_POST['year']);

    $case_start_date = mysqli_real_escape_string($conn, $_POST['case_start_date']);

   


    $query="UPDATE case_master SET 
    enquiry_no='$enquiry_no',
    court_no='$court_no',
    case_type='$case_type',
    year='$year',
    case_start_date='$case_start_date'
   WHERE case_no='$case_no'";

    //

$query_run=mysqli_query($conn,$query);

if($query_run){

?>
        <script>
        alert("Successfully Updated")
        window.location.href='../case-master';
        </script>
<?php

}
else{
    ?>

        <script>
        alert(" Not Successfully Updated")
        window.location.href='update.php?case_no=<?php echo $case_no; ?>';
        </script> 

<?php
}
}
$result= mysqli_query($conn,"SELECT * FROM case_master where case_no='".$_GET['case_no']."'");

$updaterow=mysqli_fetch_array($result);
?>

<html>
<head>
<title> Update data </title>
</head>
<body>
<form method="POST">
<input type="hidden" name="case_no" value="<?php echo $caseno; ?>">
Enquiry No :
        <select name="enquiry_no" id="enquiry_no">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM enquiry WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option 
            <?php if ($updaterow['enquiry_no']==$row["enquiry_no"]) {echo "selected";} ?>  
            value="<?php echo $row["enquiry_no"];?>"><?php echo $row["enquiry_no"]. '-' .$row["client_name"];?></option>
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

Court No :
       <select name="court_no" id="court_no">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM court WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option <?php if ($updaterow['court_no']==$row["court_no"]) {
                echo "selected";
            } ?> value="<?php echo $row["court_no"];?>"><?php echo $row["court_no"]. '-' .$row["court_name"];?></option>
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

Case Type :
        <select name="case_type" id="case_type">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM case_type WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option <?php if ($updaterow['case_type']==$row["case_type_id"]) {
                echo "selected";
            } ?> value="<?php echo $row["case_type_id"];?>"><?php echo $row["case_type_id"]. '-' .$row["case_type_tittle"];?></option>
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

Year :
      <?php
       $currentyearplusefive = strftime("%Y", time()) + 5;
        $currentyearminusfive = strftime("%Y", time()) - 5;

        $years = range($currentyearminusfive, $currentyearplusefive); ?>
        <select name="year"> 
        <option>Year</option>
        <?php foreach($years as $year) : ?>
            <option <?php if ($updaterow['year']==$year) {
                echo "selected";
            } ?> value="<?php echo $year; ?>"><?php echo $year; ?></option>
        <?php endforeach; ?>
        </select><br><br> 

Case Start Date :
<input type ="date" name="case_start_date" value="<?php echo $updaterow["case_start_date"];?>">
<br><br>

<input type="submit" name="edit" id="edit" value="submit">

<script>

</script>
</body>

</html>