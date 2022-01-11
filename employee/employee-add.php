<?php
include_once "../includes/header.php";
if (isset($_POST["submit"])) {
        
    $name =mysqli_real_escape_string($conn, $_POST ['name']);
    

    $sql = "INSERT INTO employee (name)
    VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<form method="post">

 Name: <input type="text" name="name"><br>


<input type="submit" name="submit">
</form>

</body>
</html>