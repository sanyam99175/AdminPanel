<?php
include "../includes/db.php";

  session_start();
  if(isset($_SESSION["email"]) ){
    header("location: homepage.php");
    exit;
}

 
   
   if(isset($_POST["login"]))
   {
      $email = $_POST["email"];
      $password = $_POST["pwd"]; 
      
      $sql = "SELECT * FROM login WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($cn,$sql);
      $data=mysqli_fetch_array($result);
	  if(!empty($data))
	  {
		$count = mysqli_num_rows($result);
      
      
		
      if($count == 1) {
         $_SESSION['email'] = $email;
         header("location: homepage.php");
      }else {
         $error = "Your Login email or Password is invalid";
      }
	}
	else{
		echo "login failed";
	}
   }
   mysqli_close($cn);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="form" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" id="login" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      

   
    </div>
    <!-- /.login-card-body -->
  </div>

<!-- /.login-box -->


</body>
<style>
  .error {
    color: red;
  }
</style>
</html>

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script>
  $(document).ready(function () {
    $('#form').validate({
      rules: {
        
        email: {
          required: true,
          email: true
        },
        
        pwd: {
          required: true,
          minlength: 5
        },
        
      },
      messages: {
        
        email: {
          required: 'Please enter Email Address.',
          email: 'Please enter a valid Email Address.',
        },
       
        password: {
          required: 'Please enter Password.',
          minlength: 'Password must be at least 5 characters long.',
        },
       
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  });
</script>



