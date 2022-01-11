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


$result = mysqli_query($conn,"SELECT *,a.created_at AS created_date FROM 
case_master a 
JOIN case_type b 
ON a.case_type=b.case_type_id 
JOIN court c
ON a.court_no=c.court_no 
JOIN enquiry d 
ON a.enquiry_no=d.enquiry_no
WHERE a.is_active='1' ");

if (mysqli_num_rows($result) > 0) {
?>

<a href="add.php" >add New</a><br><br>

<form action="" method="get">
    From Date
    <input type="date" name="from_date" id="from_date">
    <br> <br>
    To Date
    <input type="date" name="to_date" id="to_date">
    <br> <br>
    Case status: 
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






<table>
    <thead>
        <tr>
            <th>Case No</th>
            <th>Enquiry<th>
            <th>Court<th>
            <th>Case Type<th>
            <th>Year<th>
            <th>Case Start Date<th>
            <th>Created At</th>
            <th>Action</th>
     </tr>
</thead>
<tbody>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
        <tr>
            <td><?php echo $row["case_no"]; ?></td>
            <td><?php echo $row["client_name"]; ?></td>
            <td><?php echo $row["court_name"]; ?></td>
            <td><?php echo $row["case_type_tittle"]; ?></td>
            <td><?php echo $row["year"]; ?></td>
            <td><?php echo $row["case_start_date"]; ?></td>
            <td><?php echo $row["created_date"]; ?></td>
           
            <td><a href="update.php?case_no=<?php echo $row["case_no"];?>">Update</a>  <a href="../case-history/?case_no=<?php echo $row["case_no"];?>">Case History</a></td>
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