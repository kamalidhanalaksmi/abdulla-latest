<?php
include_once "../includes/header.php";
if (isset($_POST["submit"])) {
        
    $case_type_tittle =mysqli_real_escape_string($conn, $_POST ['case_type_tittle']);
    

    $sql = "INSERT INTO case_type (case_type_tittle)
    VALUES ('$case_type_tittle')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<form method="post">

 Name: <input type="text" name="case_type_tittle"><br>


<input type="submit" name="submit">
</form>

</body>
</html>