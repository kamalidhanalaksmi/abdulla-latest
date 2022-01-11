<?php
include_once "../includes/header.php";
if (isset($_POST["submit"])) {
    
    $case_no = mysqli_real_escape_string($conn,$_POST ['case_no']);
    $enquiry_no = mysqli_real_escape_string($conn,$_POST ['enquiry_no']);
    $court_no = mysqli_real_escape_string($conn,$_POST ['court_no']);
    $case_type = mysqli_real_escape_string($conn,$_POST ['case_type']);
    $year = mysqli_real_escape_string($conn,$_POST ['year']);
    $case_start_date =mysqli_real_escape_string($conn,$_POST ['case_start_date']);
    
    $sql = "INSERT INTO case_master (case_no, enquiry_no, court_no, case_type, year, case_start_date)
    VALUES ('$case_no','$enquiry_no', '$court_no', '$case_type', '$year', '$case_start_date')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<form method="post">

Case No: <input type="text" name="case_no"><br><br>

Enquiry No:
        <select name="enquiry_no" id="enquiry_no">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM enquiry WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row["enquiry_no"];?>"><?php echo $row["client_name"];?></option>
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
Court No: 
        <select name="court_no" id="court_no">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM court WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row["court_no"];?>"><?php echo $row["court_name"];?></option>
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
Case Type: 
        <select name="case_type" id="case_type">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM case_type WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row["case_type_id"];?>"><?php echo $row["case_type_tittle"];?></option>
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
    Year:
        <?php
        $currentyearplusefive = strftime("%Y", time()) + 5;
        $currentyearminusfive = strftime("%Y", time()) - 5;

        $years = range($currentyearminusfive, $currentyearplusefive); ?>
        <select name="year"> 
        <option>Year</option>
        <?php foreach($years as $year) : ?>
            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
        <?php endforeach; ?>
        </select><br><br>
Case Start Date: <input type="date" name="case_start_date"><br><br>

<input type="submit" name="submit">
</form>
</body>
</html>