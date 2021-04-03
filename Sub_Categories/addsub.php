<?php
include "../includes/db.php";
$select="select * from category";
$result3=mysqli_query($cn,$select);


if(isset($_POST["addsc"]))
{
	$sctitle=$_POST["sctitle"];
    $scdes=$_POST["scdes"];
	$cat=$_POST["titles"];
	
    $filename = $_FILES['scimage']['name']; 
    $tempname = $_FILES['scimage']['tmp_name'];     
    $folder = "../assets/MyImages/".$filename; 
	move_uploaded_file($tempname,$folder);
   
	
	 $insert = mysqli_query($cn,"insert into  subcat (Cat_id,title,description,image) values ('$cat','$sctitle','$scdes','$filename')");
	if($insert)
    {
        
        header("location:viewsub.php"); 
        
    }
      	
}
if(isset($_POST["resetsc"])){
	header("location:addsub.php");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

</head>
<style>
.error{
	color: red;
}






</style>
<body class="hold-transition sidebar-mini">
<?php

include "../includes/includes.php";
include "../includes/header.php";

?>

<div class="wrapper">
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add a SubCategory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../admin/homepage.php">Home</a></li>
              <li class="breadcrumb-item active">Add SubCategory</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add a Sub-Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			 
			 
              
             </div>
			 
              <form  id="pform" method="post" enctype="multipart/form-data">
                <div class="card-body">
				<div class="form-group" >
				<label for="titles">Category Title</label><br>
				
                    <select id="titles" name="titles" class="form-control">
					<option>please select category title</option>
					<?php
	                  
	                  while($row = mysqli_fetch_array($result3))
	                   { 
		
		           ?>
                     <option value="<?php echo $row['Cat_id']?>" ><?php echo $row['name'] ?></option>
                     <?php
					   }
					   ?>
                    </select>
                    
                  </div>
                  <div class="form-group">
                    <label for="inputName">Sub-Category Title</label>
                    <input type="text" class="form-control" id="sctitle" name="sctitle" placeholder="Sub category title">
                  </div>
                  <div class="form-group">
                    <label for="ptitle">Sub-Category Description</label>
                    <input type="text" class="form-control" id="scdes" name="scdes" placeholder="Sub category description">
                  </div>
				  
                  <div class="form-group row">
					  <label for="scimage" class="col-sm-2 col-form-label">Sub-Category Image</label>
					  <input type="file" name="scimage" id="scimage" onchange="readURL(this);"> 
					  <img id="adsubimage"  />
					  </div>
                   
                 
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="addsc" id="addsc" class="btn btn-primary">Add</button>
				  
                </div>
              </form>
			  <form style="padding-left:20px" method="post" >
			  <button type="submit"  name="resetsc" id="resetsc" class="btn btn-primary" onClick="Alert()">Reset</button>
			  
			  </form>
            </div>
            <!-- /.card -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</div>
</div>
</section>
</div>
</div>

</body>
</html>

<?php
include "../includes/footer.php";
?>
 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
function Alert(){
	alert ("Are you sure you want to reset?");
}
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

  $(document).ready(function () {
    $('#pform').validate({
      rules: {
        
        
        
        sctitle: {
          required: true,
          
        },
		  scdes: {
          required: true,
          
        },
		
        
      },
      messages: {
        
       
        sctitle: {
          required: 'Please enter Sub Category title.',
          
        },
		
        scdes: {
          required: 'Please enter Sub Category description.',
          
        },

		 
       
      },
      submitHandler: function (pform) {
        pform.submit();
      }
    });
  });
</script>
<script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#adsubimage')
                        .attr('src', e.target.result)
                        .width(70)
                        .height(70);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


</script>


