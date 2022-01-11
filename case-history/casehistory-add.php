<?php
include_once "../includes/header.php";
$caseno= $_GET["case_no"];
if (isset($_POST["submit"])) {
        
    $case_no = mysqli_real_escape_string($conn,$_POST ['case_no']);
    $stage_id = mysqli_real_escape_string($conn,$_POST ['stage_id']);
    $appeared_by = mysqli_real_escape_string($conn,$_POST ['appeared_by']);
    $case_status = mysqli_real_escape_string($conn,$_POST ['case_status']);
    $next_stage = mysqli_real_escape_string($conn,$_POST ['next_stage']);
    $appeared_date =mysqli_real_escape_string($conn,$_POST ['appeared_date']);
    $note = mysqli_real_escape_string($conn,$_POST ['note']);
    

    $sql = "INSERT INTO case_history (case_no, stage_id, appeared_by, status, next_stage, appeared_date, note)
    VALUES ('$case_no', '$stage_id', '$appeared_by', '$case_status', '$next_stage', '$appeared_date','$note')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<form method="post">

<input type="hidden" name="case_no" value="<?php echo $caseno; ?>">

Stage :
        <select name="stage_id" id="stage_id">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM stages WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row["stage_no"];?>"><?php echo $row["stage_name"];?></option>
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
Appeared By:
        <select name="appeared_by" id="appeared_by">
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
Status:
        <select name="case_status" id="case_status">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM status WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row["id"];?>"><?php echo $row["case_status"];?></option>
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

Next Stage:
        <select name="next_stage" id="next_stage">
        <?php

        $result = mysqli_query($conn,"SELECT * FROM stages WHERE is_active='1' ");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row["stage_no"];?>"><?php echo $row["stage_name"];?></option>
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

Appeared Date: <input type="date" name="appeared_date"><br><br>

<label for="note">Note:</label>
<textarea id="note" name="note">
</textarea>
<br> <br>
<input type="submit" name="submit">
</form>

</body>
</html>