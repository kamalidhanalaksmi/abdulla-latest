<?php

include_once "../includes/header.php";

$result = mysqli_query($conn,"SELECT * FROM employee WHERE is_active='1'");

if (mysqli_num_rows($result) > 0) {
?>
<a href="add.php" >add New</a><br><br>


<table>
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
        <tr>
            <td><?php echo $row["name"]; ?></td>
           
            <td><a href="update.php?id=<?php echo $row["id"];?>">Update</a></td>
        </tr>
<?php
$i++;
}
?>

    </tbody>
</table>
 <?php
}
else{
    echo "No result found";
}
?>