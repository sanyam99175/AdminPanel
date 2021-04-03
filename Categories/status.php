<?php
include "../includes/db.php";
$id= $_POST['id'];
$qry=mysqli_query($cn,"select * from category where Cat_id='$id'");
$data=mysqli_fetch_array($qry);
if($data['status']=='0'){
mysqli_query($cn,"update category set status = '1' where Cat_id='$id'");
echo "1";
}
else
{
    mysqli_query($cn,"update category set status = '0'  where Cat_id='$id'");
    echo "0";
}
 


?>