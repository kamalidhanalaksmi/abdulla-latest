<?php

include_once "../includes/header.php";
$result = mysqli_query($conn,"SELECT * FROM case_type WHERE is_active='1' ");
?>

<a href="add.php" >add New</a><br><br>
<?php
if (mysqli_num_rows($result) > 0) {
?>


<table>
    <thead>
        <tr>
            <th>Case Type</th>
        </tr>
    </thead>
    <tbody>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
        <tr>
            <td><?php echo $row["case_type_tittle"]; ?></td>
           
           
            <td><a href="update.php?case_type_id=<?php echo $row["case_type_id"];?>">Update</a></td>
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