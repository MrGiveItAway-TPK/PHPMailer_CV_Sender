<style>
table {
  border-collapse: collapse;
  width: 100%;
}

td, th, tr {
  border: 1px solid black;
  text-align: left;
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
<th style='text-align:center;'>#</th>
<th style='text-align:center;'>Company Email</th>
<th style='text-align:center;'>Company Name</th>
<th style='text-align:center;'>Email Status</th>
<th style='text-align:center;'>Email Status Date</th>
<th style='text-align:center;'>Email Status Time</th>
<th style='text-align:center;'>Email Body</th>
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
<td style='text-align:center;'>".$ID."</td>
<td style='text-align:center;'>".$Company_Email."</td>
<td style='text-align:center;'>".$Company_Name."</td>
<td style='text-align:center;'>".$Email_Status."</td>
<td style='text-align:center;'>".$Email_Status_Date."</td>
<td style='text-align:center;'>".$Email_Status_Time."</td>
<td>".$Email_Body."</td>
</tr>";
}
?>