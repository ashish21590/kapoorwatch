<?php
include("include/config.php");

$query1=mysql_query("select * from questions") or die(mysql_error());
$myarr=array();
 while($rs=mysql_fetch_assoc($query1))
{

$myarr[]=$rs;

}
   echo json_encode($myarr);

 ?>
