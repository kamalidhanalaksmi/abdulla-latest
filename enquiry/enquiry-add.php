<?php
include_once "../includes/header.php";
if (isset($_POST["submit"])) {
        
    $client_name =mysqli_real_escape_string($conn, $_POST ['client_name']);
    $address = mysqli_real_escape_string($conn,$_POST ['address']);
    $city = mysqli_real_escape_string($conn,$_POST ['city']);
    $state = mysqli_real_escape_string($conn,$_POST ['state']);
    $country = mysqli_real_escape_string($conn,$_POST ['country']);
    $pincode =mysqli_real_escape_string($conn,$_POST ['pincode']);

    $primary_contactno = mysqli_real_escape_string($conn,$_POST ['primary_contactno']);
    $alternative_contactno = mysqli_real_escape_string($conn, $_POST ['alternative_contactno']);
    
    $enquiry_attended_by = mysqli_real_escape_string($conn,$_POST ['enquiry_attended_by']);
    $enquiry_summary = mysqli_real_escape_string($conn,$_POST ['enquiry_summary']);
    $enquiry_status = mysqli_real_escape_string($conn,$_POST ['enquiry_status']);
    $enquiry_taken_by =mysqli_real_escape_string($conn,$_POST ['enquiry_taken_by']);
    $suggestion_given_by = mysqli_real_escape_string($conn,$_POST ['suggestion_given_by']);
    $enquiry_date = mysqli_real_escape_string($conn,$_POST ['enquiry_date']);
    $enquiry_time = mysqli_real_escape_string($conn,$_POST ['enquiry_time']);

    $sql = "INSERT INTO enquiry (client_name, address, city, state, country,pincode, primary_contactno, alternate_contactno, enquiry_attended_by, enquiry_summary, enquiry_status, enquiry_taken_by, suggestion_given_by, enquiry_date,enquiry_time)
    VALUES ('$client_name', '$address', '$city', '$state', '$country', '$pincode','$primary_contactno', '$alternative_contactno',
    '$enquiry_attended_by', '$enquiry_summary', '$enquiry_status', '$enquiry_taken_by','$suggestion_given_by', '$enquiry_date', '$enquiry_time')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<form method="post">

Client Name: <input type="text" name="client_name"><br><br>
Address: <input type="text" name="address"><br><br>
City: <input type="text" name="city"><br><br>
State: <input type="text" name="state"><br><br>
Country: <input type="text" name="country"><br><br>
Pincode: <input type="text" name="pincode"><br><br>
Primary Contact No: <input type="text" name="primary_contactno"><br><br>
Alternative Contact No: <input type="text" name="alternative_contactno"><br><br>
Case attended by:

<select name="enquiry_attended_by" id="enquiry_attended_by">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM employee WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
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
Enquiry Summary: 
        <textarea name="enquiry_summary" id="enquiry_summary" cols="20" rows="3">
        </textarea><br><br>
Enquiry status: 
        <select name="enquiry_status" id="enquiry_status">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM enquiry_status WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row["id"];?>"><?php echo $row["enquiry_status"];?></option>
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
Enquiry taken by: 
<select name="enquiry_taken_by" id="enquiry_taken_by">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM employee WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
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
Suggestion given by:
<select name="suggestion_given_by" id="suggestion_given_by">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM employee WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
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
Enquiry Date: <input type="date" name="enquiry_date"><br><br>
Enquiry Time: <input type="time" name="enquiry_time"><br><br>
<input type="submit" name="submit">
</form>

</body>
</html>