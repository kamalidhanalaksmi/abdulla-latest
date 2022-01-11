<?php

include_once "../includes/header.php";
$caseno= $_GET["case_no"];
$result = mysqli_query($conn,"SELECT *,
a.created_at AS created_date,
c.stage_name AS nextstage_name,
e.stage_name AS this_stage
FROM 
case_history a 
JOIN employee b 
ON a.appeared_by=b.id
JOIN stages c
ON a.next_stage=c.stage_no 
JOIN status d
ON a.status=d.id
JOIN stages e
ON a.stage_id=e.stage_no 
WHERE a.is_active='1'");



?>

<a href="add.php?case_no=<?php echo $caseno;?>" >add New</a><br><br>
<?php
if (mysqli_num_rows($result) > 0) {
?>


<table>
    <thead>
        <tr>
            <th>Case No</th>
            <th>Stage <th>
            <th>Appeared By<th>
            <th>Status<th>
            <th>Next Stage<th>
            <th>Appeared Date<th>
            <th>Note<th>
            <th>Action<th>

            </tr>
    </thead>
    <tbody>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
        <tr>
            <td><?php echo $row["case_no"]; ?></td>
            <td><?php echo $row["this_stage"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["case_status"]; ?></td>
            <td><?php echo $row["nextstage_name"]; ?></td>
            <td><?php echo $row["appeared_date"]; ?></td>
            <td><?php echo $row["note"]; ?></td>
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