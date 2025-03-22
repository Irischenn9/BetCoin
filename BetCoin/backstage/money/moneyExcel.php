<?php
require("../LinkToSQL.php");

header("Pragma: public");
header("Expires: 0"); 
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: inline; filename="money.xls";');
header('Content-Transfer-Encoding: binary');

echo "<table border='1'>";
echo "<tr>";
echo "<td>uNo</td>";
echo "<td>uName</td>";
echo "<td>pwd</td>";
echo "<td>uRole</td>";
echo "</tr>";

$SQL="SELECT * FROM money";
$result=mysqli_query($LinkToSQL,$SQL);

while($row=mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$row['no']."</td>";
    echo "<td>".$row['uNo']."</td>";
    echo "<td>".$row['sourceFrom']."</td>";
    echo "<td>".$row['changeAmount']."</td>";
    echo "<td>".$row['changeTime']."</td>";
    echo "</tr>";
}
echo "</table>";
?>