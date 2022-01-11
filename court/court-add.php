<?php
include_once "../includes/header.php";
if (isset($_POST["submit"])) {
        
   $court_name = mysqli_real_escape_string($conn, $_POST ['court_name']);
   
    
   $sql = "INSERT INTO court ( court_name)
    VALUES ( '$court_name')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    }
    ?>
    <form method="post">
    Court Name:
    <input type="text" name="court_name">
<input type="submit" name="submit">
</form>

</body>
</html>