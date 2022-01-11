<?php

include_once "../includes/header.php";
$result = mysqli_query($conn,"SELECT * FROM court WHERE is_active='1' ");
?>

<a href="add.php" >add New</a><br><br>
<?php
if (mysqli_num_rows($result) > 0) {
?>

<table>
    <thead>
        <tr>
            <th>Court Name</th>
        </tr>
    </thead>
    <tbody>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
        <tr>
            <td><?php echo $row["court_name"]; ?></td>
           
           
            <td><a href="update.php?court_no=<?php echo $row["court_no"];?>">Update</a></td>
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