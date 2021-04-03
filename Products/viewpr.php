<?php
include "../includes/db.php";

$select="select * from category  join subcat on category.Cat_id = subcat.Cat_id   join products on subcat.id = products.SubCat_id where stat='0'";

$result2=mysqli_query($cn,$select);





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Product details</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <script>
  function showAlert() {
    alert ("Are you sure");
  }
  </script>
</head>
<body class="hold-transition sidebar-mini">
<?php

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
            <h1>View Pending Product <a href="addpr.php" ><button type="button" style="margin-left: 30px" class="btn  btn-primary">ADD PRODUCT</button></a></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../admin/homepage.php">Home</a></li>
              <li class="breadcrumb-item active">View Pending Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" style="box-sizing:border-box; font-size: 0.6vw">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover" style="box-sizing:border-box">
                  <thead>
                  <tr>
                    <th>ID</th>
					<th>CATEGORY_TITLE</th>
                    <th>SUBCATEGORY_TITLE</th>
                    <th>PRODUCT_TITLE</th>
                    <th>PRODUCT_DESCRIPTION</th>
                    <th>PRODUCT_IMAGE</th>
                    <th>ACTUAL_PRICE</th>
                    <th>DISCOUNT</th>
                    <th>SALES_PRICE</th>
                    <th>STATUS</th>
					          <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php
	                  $i=1;
	                  while($row = mysqli_fetch_array($result2))
	                   { 
		
		           ?>
                  <tr>
                    <td><?php echo $i   ?></td>
					<td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['title'] ?></td>
					<td><?php echo $row['pr_title'] ?></td>
                    <td><?php echo $row['pr_description'] ?></td>
                    
                    <td><img  style="width:50px"src="../assets/MyImages/<?php echo $row['pr_image'] ?>"></td>
                    <td><?php echo $row['actual_price'] ?></td>
                    <td><?php echo $row['discount'] ?></td>
                    <td><?php echo $row['sales_price'] ?></td>
                    <td><button type="button" class="btn  btn-success"><a style="color:white" onclick="approve(<?php echo $row['id'] ?>)">APPROVE</a></button>
		           <button type="button" class="btn  btn-danger"><a  style="color:white" onclick="reject(<?php echo $row['id'] ?>)" >REJECT</a></button></td>
					<td><button type="button" class="btn  btn-success"><a style="color:white"href="editpr.php?id=<?php echo $row['id']?>">EDIT</a></button>
		           <button type="button" class="btn  btn-danger"><a  style="color:white" href="deletepr.php?id=<?php echo $row['id']?>"  onclick="showAlert()">DELETE</a></button></td>
                  </tr>
                 <?php  $i++;} ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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


<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  function approve(ids){
  var id = ids;
  console.log(id);
            $.ajax({
                type: "post",
                url: "approveproduct.php",
                data: {"id": id },
                success: function (data) {
                  
                  if(data==1){
                     alert("product Approved");
                     window.location.replace("approvepr.php");
                  }
                  else
                  {
                    alert("Product not approved");
                  }
                  
                    
                }
            });
       
}
function reject(ids){
  var id = ids;
  console.log(id);
            $.ajax({
                type: "post",
                url: "rejectproduct.php",
                data: {"id": id },
                success: function (data) {
                  
                  if(data==1){
                     alert("product Rejected");
                     window.location.replace("rejectpr.php");
                  }
                  else
                  {
                    alert("Product not Rejected");
                  }
                  
                    
                }
            });
       
}
</script>
</body>
</html>
