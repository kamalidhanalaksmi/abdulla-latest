<?php
include_once "../includes/header.php";
if (isset($_POST["submit"])) {
        
   $case_status = mysqli_real_escape_string($conn, $_POST ['case_status']);
   
    
   $sql = "INSERT INTO status ( case_status)
    VALUES ( '$case_status')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    }
    ?>
    <form method="post">
    Case Status:
    <input type="text" name="case_status">
<input type="submit" name="submit">
</form>

</body>
</html>