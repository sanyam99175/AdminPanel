<?php
include "../includes/db.php";
$select="select * from profile";
$result=mysqli_query($cn,$select);
$data=mysqli_fetch_array($result);

if(isset($_POST["update"]))
{
	$name=$_POST["inputName"];
    $email=$_POST["inputEmail"];
	$designation=$_POST["inputDesig"];
	$location=$_POST["inputLoc"];
	$education= $_POST["inputEd"];
    $skills= $_POST["inputSkills"];
    $filename = $_FILES['img']['name']; 
    $tempname = $_FILES['img']['tmp_name'];    
    $fname = $_FILES['imglogo']['name']; 
    $tname = $_FILES['imglogo']['tmp_name']; 
    $folder = "../assets/MyImages/".$filename; 
    $folder2 = "../assets/MyImages/".$fname;
	move_uploaded_file($tempname,$folder);
  move_uploaded_file($tname,$folder2);
   
	if( !empty($filename) && !empty($fname))
	{
		
	 $edit = mysqli_query($cn,"update  profile set name='$name', email='$email',  designation='$designation', location='$location',
	 education='$education',skills='$skills', image='$filename', logo='$fname' ");
   
	
}
else if(empty($filename) && !empty($fname)){
  $edit = mysqli_query($cn,"update  profile set name='$name', email='$email',  designation='$designation', location='$location',
  education='$education',skills='$skills',  logo='$fname' ");
}
else if(!empty($filename) && empty($fname)){
  $edit = mysqli_query($cn,"update  profile set name='$name', email='$email',  designation='$designation', location='$location',
  education='$education',skills='$skills',  image='$filename' ");
}
   

  else{
    $edit = mysqli_query($cn,"update profile set name='$name', email='$email',  designation='$designation', location='$location',
    education='$education',skills='$skills' " );
  }

	 
	  if($edit)
    {
        
        header("location:profile.php"); 
        
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
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

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
  

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../admin/homepage.php">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../assets/MyImages/<?php echo $data["image"]   ?>"
                       alt="User profile picture">
                </div>

                <h3 id="ch" class="profile-username text-center"><?php echo $data['name']?></h3>

                <p class="text-muted text-center"><?php echo $data['designation']?></p>

               

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  <?php echo $data['education']?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted"><?php echo $data['location']?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger"><?php echo $data['skills']?></span>
                  
                </p>

                <hr>

               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">

                  <li class="nav-item"><a class="active nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                 
                    

                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal" id="form" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" value="<?php echo $data['name']?>" onkeyup="match(value,<?php echo $data['id']?>)" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="<?php echo $data['email']?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputDesig" class="col-sm-2 col-form-label">Designation</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputDesig" name="inputDesig" placeholder="Designation" value="<?php echo $data['designation']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputLoc" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputLoc" name="inputLoc" placeholder="Location" value="<?php echo $data['location']?>">
                        </div>
                      </div>
					   <div class="form-group row">
                        <label for="inputEd" class="col-sm-2 col-form-label">Education</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEd" name="inputEd" placeholder="Education" value="<?php echo $data['education']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" name="inputSkills" placeholder="Skills" value="<?php echo $data['skills']?>">
                        </div>
                      </div>
					  <div class="form-group row">
					  <label for="img" class="col-sm-2 col-form-label">Profile Picture</label>
					  <input type="file" name="img" id="img" onchange="readURL(this);" >
            <img id= "imgs" />
					  </div>
            <div class="form-group row">
					  <label for="imglogo" class="col-sm-2 col-form-label">Logo</label>
					  <input type="file" name="imglogo" id="imglogo" onchange="readURLs(this);" >
            <img id= "imgslogo" />
					  </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="update" id="update" class="btn btn-danger">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


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
  const a=document.getElementById("ch");
                a.innerHtml="adasdasdsa";
    </script>
<script>
  $(document).ready(function () {
    
    $('#form').validate({
      rules: {
        
        
        
        inputName: {
          required: true,
          
        },
		  inputEmail: {
          required: true,
          
        },
		inputDesig: {
          required: true,
          
        },
		inputLoc: {
          required: true,
          
        },
		inputEd: {
          required: true,
          
        },
		inputSkills: {
          required: true,
          
        },
        
      },
      messages: {
        
       
        inputName: {
          required: 'Please enter Name.',
          
        },
		
        inputEmail: {
          required: 'Please enter Email.',
          
        },
		 inputDesig: {
          required: 'Please enter Designation.',
          
        },
		 inputLoc: {
          required: 'Please enter Location.',
          
        },
		inputEd: {
          required: 'Please enter Education.',
          
        },
		inputSkills: {
          required: 'Please enter Skills.',
          
        },
       
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  });
</script>
<script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgs')
                        .attr('src', e.target.result)
                        .width(70)
                        .height(70);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURLs(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgslogo')
                        .attr('src', e.target.result)
                        .width(70)
                        .height(70);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function match(name,id){
    
  $.ajax({
                type: "post",
                url: "matchit.php",
                data: {"id": id,
                        "name":name
                         },
                         success: function () {
                }

            });

 
 

}
</script>
