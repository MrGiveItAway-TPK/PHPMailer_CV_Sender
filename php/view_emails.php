<style>
table {
  border-collapse: collapse;
  width: 100%;
}

td, th, tr {
  border: 1px solid black;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #ddd;
}
</style>
<?php
include 'conn.php';

echo "<table>
<tr>
<th>#</th>
<th>Company Email</th>
<th>Company Name</th>
<th>Email Status</th>
<th>Email Status Date</th>
<th>Email Status Time</th>
<th>Email Body</th>
</tr>";

$sql_0 = "SELECT * FROM emails_cv";
$stmt_0 = mysqli_query($conn,$sql_0) or die( mysqli_error($conn));

while($row_0 = mysqli_fetch_array($stmt_0))
{
$ID=$row_0['ID'];
$Company_Email=$row_0['Company_Email'];
$Company_Name=$row_0['Company_Name'];
$Email_Status=$row_0['Email_Status'];
if($Email_Status==NULL){$Email_Status="Not Sent";}
$Email_Status_Date=$row_0['Email_Status_Date'];
$Email_Status_Time=$row_0['Email_Status_Time'];
$Email_Body=$row_0['Email_Body'];

echo "<tr>
<th>".$ID."</td>
<th>".$Company_Email."</td>
<th>".$Company_Name."</td>
<th>".$Email_Status."</td>
<th>".$Email_Status_Date."</td>
<th>".$Email_Status_Time."</td>
<td style='text-algin:left;'>".$Email_Body."</td>
</tr>";
}
?>