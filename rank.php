<meta http-equiv="refresh" content="240" >

<?php
$sno=1;

/*$con = mysql_connect('localhost','root','root');
if (!$con)
{
	die('Could not connect to database : ' . mysql_error());
}
mysql_select_db("arp_oth", $con);*/
require_once("config.php");


$query="select * from sheet order by level desc,time asc";
if (!($result=mysql_query($query,$con)))
{
	die('Error: ' . mysql_error());  	
}
echo "<center><b> Rank Card  </b><br/><br/>";
echo "<table border='1'>
<tr>
<th> Rank </th>
<th> USN </th>
<th> Name </th>
<th> Level </th>
<th> Time </th>
</tr>";
while($row = mysql_fetch_array($result))
{

	echo "<tr>";
	echo "<td>" . $sno++ . "</td>";
	echo "<td>" . $row['usn'] . "</td>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['level'] . "</td>";
	echo "<td>" . $row['time'] . "</td>";
	echo "</tr>";
}

echo "</table></center>"; 
mysql_close($con);
?>

<head>
<title> Rank Card </title>
</head>

<body>

<link rel="stylesheet" href="css/pirate.css" type="text/css" media="screen" title="no title" charset="utf-8" />

</body>
</html>
