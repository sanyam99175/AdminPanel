<?php
include "../includes/db.php";
$id= $_POST['id'];
$name= $_POST['name'];
mysqli_query($cn,"update profile set name='$name' where id='$id'");



?>