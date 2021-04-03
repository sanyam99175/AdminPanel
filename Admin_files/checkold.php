<?php
include "../includes/db.php";

session_start();

$oldpassword= $_POST['oldpass'];
$qry=mysqli_query($cn,"select * from login where password=$oldpassword");
$res=mysqli_num_rows($qry);
if($res==0){
		echo "false";
	}
else{
	echo "true";
}
	



?>