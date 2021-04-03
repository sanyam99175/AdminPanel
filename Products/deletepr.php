<?php

    
	include "../includes/db.php";
    $id = $_GET['id'];
	$delete = mysqli_query($cn,"delete from products where id='$id'");
	 
	  if($delete)
    {
		
        
        header("location:viewpr.php"); 
        
    }
	




?>