<?php
include "../includes/db.php";
$ids = $_GET['id'];
$qry = mysqli_query($cn,"select * from category where Cat_id='$ids'");
$dat = mysqli_fetch_array($qry);



if(isset($_POST['update']))
{
	$pname=$_POST['pname'];
    $ptitle=$_POST['ptitle'];
	$pdes=$_POST['pdes'];
	$filename = $_FILES['pimage']['name']; 
    $tempname = $_FILES['pimage']['tmp_name'];     
    $folder = "../assets/MyImages/".$filename; 
	move_uploaded_file($tempname,$folder);
	
	
	
	if(!empty($filename))
	{
		
	 $edits = mysqli_query($cn,"update  category set name='$pname', Cat_title='$ptitle', Cat_description='$pdes',  image='$filename' where Cat_id='$ids'");
	}
	else
	{
		$edits = mysqli_query($cn,"update category set name='$pname', Cat_title='$ptitle', Cat_description='$pdes'  where Cat_id='$ids'");
	}
	 
	  if($edits)
    {
        
        header("location:view.php"); 
        
    }
      	
	
	
    
	
 	
	
	
	
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
            <h1>Edit Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../admin/homepage.php">Home</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
                    <input type="text" class="form-control" id="pname" name="pname" placeholder="Name" value="<?php echo $dat['name']?>">
                  </div>
                  <div class="form-group">
                    <label for="ptitle">Category Title</label>
                    <input type="text" class="form-control" id="ptitle" name="ptitle" placeholder="title" value="<?php echo $dat['Cat_title']?>">
                  </div>
				  <div class="form-group">
                    <label for="pdes">Category Description</label>
                    <input type="text" class="form-control"id="pdes" name="pdes" placeholder="Description" value="<?php echo $dat['Cat_description']?>">
                  </div>
                  <div class="form-group row">
					  <label for="pimage" class="col-sm-2 col-form-label">Category Image</label>
					  <input type="file" name="pimage" id="pimage"> 
					  </div>
                   
                 
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update" id="update" class="btn btn-primary">Update</button>
                </div>
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
<?php
include "../includes/footer.php";
?>
</html>
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
          required: 'Please enter Category Name.',
          
        },
		
        ptitle: {
          required: 'Please enter Category title.',
          
        },
		 pdes: {
          required: 'Please enter Category Description.',
          
        },
		 
       
      },
      submitHandler: function (pform) {
        pform.submit();
      }
    });
  });
</script>
