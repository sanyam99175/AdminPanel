<?php
include "../includes/db.php";
$select="select * from category";
$result3=mysqli_query($cn,$select);
$select2="select * from SubCat";
$result4=mysqli_query($cn,$select2);

if(isset($_POST["addsc"]))
{
	$ptitle=$_POST["ptitle"];
    $pdes=$_POST["pdes"];
	$cat=$_POST["titles"];
	$scat=$_POST["stitles"];
  $actual=$_POST["aprice"];
  $discount=$_POST["dsc"];
  $sales=$_POST["sprice"];
    $filename = $_FILES['pimage']['name']; 
    $tempname = $_FILES['pimage']['tmp_name'];     
    $folder = "../assets/MyImages/".$filename; 
	move_uploaded_file($tempname,$folder);
   
	
	 $insert = mysqli_query($cn,"insert into  products (Cat_id,SubCat_id,pr_title,pr_description,pr_image,actual_price,discount,sales_price) values ('$cat','$scat','$ptitle','$pdes','$filename', 
   '$actual', '$discount', '$sales')");
	if($insert)
    {
        
        header("location:viewpr.php"); 
        
    }
      	
}
if(isset($_POST["resetsc"])){
	header("location:addpr.php");
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
            <h1>Add a Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../admin/homepage.php">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
                <h3 class="card-title">Add a Product</h3>
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
                     <option  value="<?php echo $row['Cat_id']?>" ><?php echo $row['name'] ?></option>
                     <?php
					   }
					   ?>
                    </select>
                    
                  </div>
				  	<div class="form-group" >
				<label for="titles">Sub-Category Title</label><br>
				
                    <select id="stitles" name="stitles" class="form-control">
					<option>please select Sub-category title</option>
					<?php
	                  
	                  while($row = mysqli_fetch_array($result4))
	                   { 
		
		           ?>
                     <option value="<?php echo $row['id']?>" ><?php echo $row['title'] ?></option>
                     <?php
					   }
					   ?>
                    </select>
                    
                  </div>
                  <div class="form-group">
                    <label for="inputName">Product Title</label>
                    <input type="text" class="form-control" id="ptitle" name="ptitle" placeholder="Product title">
                  </div>
                  <div class="form-group">
                    <label for="ptitle">Product Description</label>
                    <input type="text" class="form-control" id="pdes" name="pdes" placeholder="Product description">
                  </div>
				  
                  <div class="form-group row">
					  <label for="scimage" class="col-sm-2 col-form-label">Product Image</label>
					  <input type="file" name="pimage" id="pimage" onchange="readURL(this);"> 
					  <img id="adprimage"  />
					  </div>
            <div class="form-group">
                    <label for="aprice">Actual Price</label>
                    <input type="number" class="form-control" id="aprice" name="aprice" placeholder=" Actual price" onkeyup="salesprice()">
                  </div>
                  <div class="form-group">
                    <label for="dsc">Discount</label>
                    <input type="number" class="form-control" id="dsc" name="dsc" placeholder="discount" onkeyup="newsales()" >
                  </div>
                  <div class="form-group">
                    <label for="sprice">Sales Price</label>
                    <input type="number" class="form-control" id="sprice" name="sprice" placeholder="sales price">
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
        
        
        
       ptitle: {
          required: true,
          
        },
		  pdes: {
          required: true,
          
        },
        aprice: {
          required: true,
          
        },
        dsc: {
          required: true,
          
        },
      
		
        
      },
      messages: {
        
       
        ptitle: {
          required: 'Please enter Product title.',
          
        },
		
        pdes: {
          required: 'Please enter Product description.',
          
        },
        aprice: {
          required: 'Please enter Actual price.',
          
        },
        dsc: {
          required: 'Please enter discount.',
          
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
                    $('#adprimage')
                        .attr('src', e.target.result)
                        .width(70)
                        .height(70);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


</script>
<script>

  $(document).ready(function()
{
  
      
  var ids= document.getElementById("stitles");
  var idd= document.getElementById("sprice");
 
  ids.disabled= true;
  idd.disabled=true;
  
  
    $("#titles").click(function() {

     
      
      ids.disabled = false;
      var id=(this.selectedIndex); 
        $.ajax({
        url : 'divreplace.php',
        type: "post",
        data:{"id":id},
        success: function(data){
            $('#stitles').html(data);
        }
    });
});

});


</script>
<script>
function salesprice(){
  var dss= document.getElementById("sprice");
  var ds= document.getElementById("dsc").value;
  var ap=document.getElementById("aprice").value;
   document.getElementById("sprice").value =  ap-(ap*ds)/100;
   dss.disabled=false;

}
function newsales(){
  var dss= document.getElementById("sprice");
    var ap= document.getElementById("aprice").value;
   var ds= document.getElementById("dsc").value;
   var sp= ( parseInt(ap) - ((parseInt(ds)/100) * parseInt(ap)));
   document.getElementById("sprice").value = sp;
   dss.disabled=false;
  
  
}




</script>






