<? ob_start(); ?>
<?php
//**************************************************************
//You may modify these values

$level=16;		//level number
$image="img/done.jpg";		//name of image to be displayed

//**************************************************************

$name=$_COOKIE["NAME"];
$usn=$_COOKIE["USN"];

//*******************Load from config file**********************
/*
$con = mysql_connect('localhost','root','root');
if (!$con)
{
	die('Could not connect to database : ' . mysql_error());
}
mysql_select_db("arp_oth", $con);*/
require_once("config.php");

//**************************************************************


//See if the user is trying to skip levels by guessing the most probable answers
$data=mysql_query("SELECT level FROM sheet where usn='$usn'") 
	or die(mysql_error());
$info = mysql_fetch_array( $data );  
//echo $info[level];
//echo $level-1;
if(($info[level])<($level-1))
{
	echo "User is trying to skip levels!";
	//allows the admin to know whether the team has tried cheated or not
	$sql_cheat="update sheet set cheat=1 where usn='$usn'";
	if (!mysql_query($sql_cheat,$con))
  	{
		die('Error: ' . mysql_error());
  	}
	header('Location:cheater.php'); 
}

$sql="update sheet set level='$level' where usn='$usn'";
if (!mysql_query($sql,$con))
{
	die('Error: ' . mysql_error());
}
?>

<head>
<title> Congratulations! </title>
</head>

<body>

<link rel="stylesheet" href="css/pirate.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<center>
Congratulations!
<br/>
<img src="<?echo $image?>" height=500" width="900"/>
<br/>
You have managed to find the treasure!!<br/>
Thank You for playing!<br/><br/>
The OTH game engine will be uploaded to <a href="https://github.com/arpith20">https://github.com/arpith20</a>  
</center>
<br/>
</font>

</body>
</html>
<? ob_flush(); ?>
