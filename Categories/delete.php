<?php

    
	include "../includes/db.php";
    $id = $_GET['id'];
	$delete = mysqli_query($cn,"delete from category where Cat_id='$id'");
	 
	  if($delete)
    {
		
        
        header("location:view.php"); 
        
    }
	




?>