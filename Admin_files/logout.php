<?php
include "../includes/db.php";
session_start();
   
   if(session_destroy()) {
      header("Location: logins.php");
   }




?>