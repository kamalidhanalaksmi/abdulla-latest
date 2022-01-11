<?php

include_once "../includes/header.php";
$filter='';

if (!empty($_GET["from_date"]) && !empty($_GET["to_date"])) {
    $from_date = $_GET["from_date"];
    $to_date = $_GET["to_date"];
    $filter.="AND a.enquiry_date>='$from_date' AND a.enquiry_date<= '$to_date' ";
}
if (!empty($_GET["enquiry_status"])) {
    $enquiry_status =$_GET["enquiry_status"];
    $filter.="AND a.enquiry_status='$enquiry_status'";
}
$sql="SELECT *,
a.created_at AS created_date,
b.enquiry_status as enquiry_status_name,
c.name AS enquiry_attended_person,
d.name AS suggestion_given_person,
e.name AS enquiry_taken_person
FROM 
enquiry a 
JOIN enquiry_status b 
ON a.enquiry_status=b.id
JOIN employee c
ON a.enquiry_attended_by=c.id
JOIN employee d
ON a.suggestion_given_by=d.id
JOIN employee e
ON a.enquiry_taken_by=e.id
WHERE a.is_active='1' $filter ";
$result = mysqli_query($conn,$sql);  
?>
<a href="add.php" >add New</a><br><br>

<form action="" method="get">
    From Date
    <input type="date" name="from_date" id="from_date">
    <br> <br>
    To Date
    <input type="date" name="to_date" id="to_date">
    <br> <br>
Enquiry status: 
        <select name="enquiry_status" id="enquiry_status">
        <?php

        $enquiry_status_result = mysqli_query($conn,"SELECT * FROM enquiry_status WHERE is_active='1' ");

        if (mysqli_num_rows($enquiry_status_result) > 0) {
            ?>
            <option value="">Choose Status</option>
            <?php
            while($enquiry_status_row = mysqli_fetch_array($enquiry_status_result)) {
        ?>
            <option value="<?php echo $enquiry_status_row["id"];?>"><?php echo $enquiry_status_row["enquiry_status"];?></option>
        <?php
            }
        }
        else{
        ?>
            <option value="">No Data</option>
        <?php
        }
        ?>
        </select><br><br>
    <input type="submit" value="submit">

</form>
<?php
if (mysqli_num_rows($result) > 0) {
?>

<table>
    <thead>
        <tr>
            <th>Client Name</th>
            <th>Address<th>
            <th>City<th>
            <th>State<th>
            <th>Country<th>
            <th>Pincode<th>
            <th>Primary Contactno<th>
            <th>Alternate Contactno<th>
            <th>Enquiry Attended by<th>
            <th>Enquiry Summary<th>
            <th>Enquiry Status<th>
            <th>Enquiry Taken By<th>
            <th>Suggestion Given By<th>
            <th>Enquiry Date<th>
            <th>Enquiry Time<th>
            <th>Created At<th>
            <th>Action<th>
        </tr>
    </thead>
    <tbody>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
        <tr>
            <td><?php echo $row["client_name"]; ?></td>
            <td><?php echo $row["address"]; ?></td>
            <td><?php echo $row["city"]; ?></td>
            <td><?php echo $row["state"]; ?></td>
            <td><?php echo $row["country"]; ?></td>
            <td><?php echo $row["pincode"]; ?></td>
            <td><?php echo $row["primary_contactno"]; ?></td>
            <td><?php echo $row["alternate_contactno"]; ?></td>
            <td><?php echo $row["enquiry_attended_person"]; ?></td>
            <td><?php echo $row["enquiry_summary"]; ?></td>
            <td><?php echo $row["enquiry_status_name"]; ?></td>
            <td><?php echo $row["enquiry_taken_person"]; ?></td>
            <td><?php echo $row["suggestion_given_person"]; ?></td>
            <td><?php echo $row["enquiry_date"]; ?></td>
            <td><?php echo $row["enquiry_time"]; ?></td>
            <td><?php echo $row["created_date"]; ?></td>
            <td><a href="update.php?enquiry_no=<?php echo $row["enquiry_no"];?>">Update</a></td>
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