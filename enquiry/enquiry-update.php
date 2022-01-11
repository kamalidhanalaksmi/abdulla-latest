<?php
include_once "../includes/header.php";
if(isset($_POST['edit']))
{
    $enquiry_no = mysqli_real_escape_string($conn, $_POST['enquiry_no']);
    $client_name = mysqli_real_escape_string($conn, $_POST['client_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $primary_contactno = mysqli_real_escape_string($conn, $_POST['primary_contactno']);
    $alternate_contactno = mysqli_real_escape_string($conn, $_POST['alternate_contactno']);
    $enquiry_attended_by = mysqli_real_escape_string($conn, $_POST['enquiry_attended_by']);
    $enquiry_summary = mysqli_real_escape_string($conn, $_POST['enquiry_summary']);
    $enquiry_taken_by = mysqli_real_escape_string($conn, $_POST['enquiry_taken_by']);
    $suggestion_given_by = mysqli_real_escape_string($conn, $_POST['suggestion_given_by']);
    $enquiry_date = mysqli_real_escape_string($conn, $_POST['enquiry_date']);
    $enquiry_time = mysqli_real_escape_string($conn, $_POST['enquiry_time']);
  // have to check

    $query="UPDATE enquiry SET 
    client_name='$client_name',
    address='$address',
    city='$city',
    state='$state',
    country='$country',
    pincode='$pincode',
    primary_contactno='$primary_contactno',
    alternate_contactno='$alternate_contactno',
    enquiry_attended_by='$enquiry_attended_by',
    enquiry_summary='$enquiry_summary',
    enquiry_status= '$enquiry_status',
    enquiry_taken_by='$enquiry_taken_by',
    suggestion_given_by='$suggestion_given_by',
    enquiry_date='$enquiry_date',
    enquiry_time='$enquiry_time' 
    WHERE enquiry_no='$enquiry_no'";

    //

$query_run=mysqli_query($conn,$query);

if($query_run){

?>
<script>
alert("Successfully Updated")
window.location.href='../enquiry';
</script>
<?php

}
else{
    ?>

<script>
alert(" Not Successfully Updated")
window.location.href='update.php?enquiry_no=<?php echo $enquiry_no; ?>';
</script> 

<?php
}
}
$result= mysqli_query($conn,"SELECT * FROM enquiry where enquiry_no='".$_GET['enquiry_no']."'");

$updaterow=mysqli_fetch_array($result);
?>

<html>
<head>
<title> Update data </title>
</head>
<body>
<form method="POST">


Client Name :<br>
<input type ="text" name="client_name" value="<?php echo $updaterow["client_name"];?>">
<br>

Address :<br>
<input type ="text" name="address" value="<?php echo $updaterow["address"];?>">
<br>

City :<br>
<input type ="text" name="city" value="<?php echo $updaterow["city"];?>">
<br>

State :<br>
<input type="text" name="state" value="<?php echo $updaterow["state"];?>">
<br>

Country :<br>
<input type ="text" name="country" value="<?php echo $updaterow["country"];?>">
<br>

Pincode :<br>
<input type ="text" name="pincode" value="<?php echo $updaterow["pincode"];?>">
<br>

Primary Contact No :<br>
<input type ="text" name="primary_contactno" value="<?php echo $updaterow["primary_contactno"];?>">
<br>

Alternate Contact No :<br>
<input type ="text" name="alternate_contactno" value="<?php echo $updaterow["alternate_contactno"];?>">
<br>

Case Attended By :
<select name="enquiry_attended_by" id="enquiry_attended_by">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM employee WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>

            <option

            <?php if ($updaterow['enquiry_attended_by']==$row["id"]) {echo "selected";} ?> 
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

Case Summary :<br>
<input type ="text" name="enquiry_summary" value="<?php echo $updaterow["enquiry_summary"];?>">
<br>

Case Status :<br>
<input type ="text" name="enquiry_status" value="<?php echo $updaterow["enquiry_status"];?>">
<br>

Case Taken By :

<select name="enquiry_attended_by" id="enquiry_attended_by">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM employee WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>

            <option

            <?php if ($updaterow['enquiry_attended_by']==$row["id"]) {echo "selected";} ?> 
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
Suggestion Given By :

<select name="suggestion_given_by" id="suggestion_given_by">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM employee WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>

            <option

            <?php if ($updaterow['suggestion_given_by']==$row["id"]) {echo "selected";} ?> 
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
Enquiry Date:<br>
<input type ="text" name="enquiry_date" value="<?php echo $updaterow["enquiry_date"];?>">
<br>

Enquiry Time :<br>
<input type ="text" name="enquiry_time" value="<?php echo $updaterow["enquiry_time"];?>">
<br>

<input type="submit" name="edit" id="edit" value="submit">

</body>

</html>