<?php
include "../includes/db.php";
$id= $_POST['id'];
$qry=mysqli_query($cn,"update products set stat = '2' where id='$id'");
if($qry){
echo "1";

}
else
{
    
    echo "0";
}
 


?>