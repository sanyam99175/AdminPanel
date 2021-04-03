<?php
include "../includes/db.php";
$select="select * from category";
$result=mysqli_query($cn,$select);
$data=mysqli_fetch_array($result);

if(isset($_POST["add"]))
{
	$pname=$_POST["pname"];
    $ptitle=$_POST["ptitle"];
	$pdes=$_POST["pdes"];
 
	
    $filename = $_FILES['pimage']['name']; 
    $tempname = $_FILES['pimage']['tmp_name'];     
    $folder = "../assets/MyImages/".$filename; 
     
	move_uploaded_file($tempname,$folder);
        
   
	
	 $insert = mysqli_query($cn,"insert into  category (name,Cat_title,Cat_description,image) values ('$pname','$ptitle','$pdes','$filename')");
	if($insert)
    {
        
        header("location:view.php"); 
        
    }
      	
}
if(isset($_POST["reset"])){
	header("location:add.php");
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
  <script>
  function Alert(){
	  alert("Are you sure you want to reset?");
  }
  
  </script>
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
            <h1>Category Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../admin/homepage.php">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
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
                <h3 class="card-title">Add a Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  id="pform" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Category Name</label>
                    <input type="text" class="form-control" id="pname" name="pname" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="ptitle">Category Title</label>
                    <input type="text" class="form-control" id="ptitle" name="ptitle" placeholder="title">
                  </div>
				  <div class="form-group">
                    <label for="pdes">Category Description</label>
                    <input type="text" class="form-control"id="pdes" name="pdes" placeholder="Description">
                  </div>
                  <div class="form-group row">
					  <label for="pimage" class="col-sm-2 col-form-label">Category Image</label>
					  <input type="file" name="pimage" id="pimage" onchange="readURL(this);"> 
					   <img id="adimage"  />
					  </div>
                   
                 
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="add" id="add" class="btn btn-primary">Add</button>
				  
                </div>
              </form>
			  <form style="padding-left:20px" method="post" >
			  <button type="submit"  name="reset" id="reset" class="btn btn-primary" onClick="Alert()">Reset</button>
			  
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
</body>
</html>

<?php
include "../includes/footer.php";
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
  $(document).ready(function () {
    $('#pform').validate({
      rules: {
        
        
        
        pname: {
          required: true,
          
        },
		  ptitle: {
          required: true,
          
        },
		pdes: {
          required: true,
          
        },
		
        
      },
      messages: {
        
       
        pname: {
          required: 'Please enter category Name.',
          
        },
		
        ptitle: {
          required: 'Please enter category title.',
          
        },
		 pdes: {
          required: 'Please enter category Description.',
          
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
                    $('#adimage')
                        .attr('src', e.target.result)
                        .width(70)
                        .height(70);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


</script>

