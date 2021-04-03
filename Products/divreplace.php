<?php
include "../includes/db.php";
$newid=$_POST["id"];
$qrry=mysqli_query($cn,"select * from subcat where Cat_id= '$newid'");




?>
<html>
<body>

<div id="newtitles" class="form-group">

				<label for="stitles">Sub-Category Title</label><br>
				
                    <select id="stitles" name="stitles" class="form-control">
					<option>please select Sub-category title</option>
					<?php
	                  
	                  while($row = mysqli_fetch_array($qrry))
	                   { 
		
		           ?>
                     <option value="<?php echo $row['id']?>" ><?php echo $row['title'] ?></option>
                     <?php
					   }
					   ?>
                    </select>
                    
                  </div>

</div>


</body>




</html>