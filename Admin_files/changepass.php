<?php
include "../includes/db.php";
session_start();
if(isset($_POST['changepass'])){
	$newpassword=$_POST['newpass'];
	$qry=mysqli_query($cn,"update login set password='$newpassword'");
    if($qry){
		session_destroy();
	header("location: logins.php");
     }

  }



?>
  

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Change Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  
</head>
<body class="hold-transition sidebar-mini login-page">


<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, change your password now.</p>

      <form id="form"  method="post">
	  <div class="input-group mb-3">
          <input type="password" class="form-control" name="oldpass" id="oldpass" placeholder="Old Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="newpass" id="newpass" placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="conpass" id="conpass" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="changepass" id="changepass" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


</body>



 


</html>
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function () {
$( "#form" ).validate({
  rules: {
    oldpass: {
      required: true,
     
      remote: {
        url: "checkold.php",
        type: "post"
        
      }
    },
	 newpass: {
      required: true
     },
	 conpass: {
      required: true,
	  equalTo: "#newpass",
	  
     }
    },
	
 
  messages: {
	  oldpass: {
		  required:'please enter old password',
		  remote: 'incorrect old password'
	  },
	   newpass: {
		  required:'please enter new password'
		  
		
	  },
	  conpass: {
		  required:'please enter confirm password'		  
		
	  }
  }

});
});
</script>
