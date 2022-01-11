<?php

include_once "../includes/header.php";
$result = mysqli_query($conn,"SELECT * FROM enquiry_status WHERE is_active='1' ");
?>

<a href="add.php" >add New</a><br><br>
<?php
if (mysqli_num_rows($result) > 0) {
?>

<table>
    <thead>
        <tr>
            <th>Enquiry Status</th>
        </tr>
    </thead>
    <tbody>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
        <tr>
            <td><?php echo $row["enquiry_status"]; ?></td>
           
           
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