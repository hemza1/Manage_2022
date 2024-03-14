<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
require('db.php');
$q = intval($_GET['q']);

mysqli_select_db($con,"client");
$sql="SELECT service FROM client JOIN agency ON client.id = agency.id";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>

<th>Service</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['service'] . "</td>";
  
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>