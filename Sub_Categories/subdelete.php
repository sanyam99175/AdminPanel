<?php

    
	include "../includes/db.php";
    $id = $_GET['id'];
	$delete = mysqli_query($cn,"delete from SubCat where id='$id'");
	 
	  if($delete)
    {
		
        
        header("location:viewsub.php"); 
        
    }
	




?>