<?php
include_once "../includes/header.php";
if (isset($_POST["submit"])) {
        
   $enquiry_status = mysqli_real_escape_string($conn, $_POST ['enquiry_status']);
   
    
   $sql = "INSERT INTO enquiry_status ( enquiry_status)
    VALUES ( '$enquiry_status')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    }
    ?>
    <form method="post">
    Enquiry Status:
    <input type="text" name="enquiry_status">
<input type="submit" name="submit">
</form>

</body>
</html>