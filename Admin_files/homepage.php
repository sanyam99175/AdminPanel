<?php
 include "../includes/db.php";
 $select="select * from category";
 $res=mysqli_query($cn,$select);
 $select2="select * from subcat";
 $res2=mysqli_query($cn,$select2);
 $select3="select * from products";
 $res3=mysqli_query($cn,$select3);
 $select4="select * from category where status='1'";
 $res4=mysqli_query($cn,$select4);
 $countactive=mysqli_num_rows($res4);
 $countcategory=0;
 $countsubcat=0;
 $countproducts=0;
 while(mysqli_fetch_array($res)){
	 $countcategory++;
 }
 while(mysqli_fetch_array($res2)){
  $countsubcat++;
}
while(mysqli_fetch_array($res3)){
  $countproducts++;
}
 
 
 session_start();
if(!isset($_SESSION["email"]) ){
    header("location: logins.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
   <?php
   include "../includes/includes.php";
   include "../includes/header.php";
   
   
   
   ?>
   
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $countcategory; ?></h3>

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="fa fa-star"></i>
              </div>
              <a href="../category/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $countsubcat; ?><sup style="font-size: 20px"></sup></h3>

                <p>Sub Categories</p>
              </div>
              <div class="icon">
                <i class="fa fa-star-half-full"></i>
              </div>
              <a href="../subcategory/viewsub.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $countproducts; ?></h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="fa fa-star"></i>
              </div>
              <a href="../products/viewpr.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $countactive  ?></h3>

                <p>Active categories</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="../category/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
		</div>
		</section>
		
		</div>
		
		<?php
		include "../includes/footer.php";
		
		
		?>
</body>
</html>





