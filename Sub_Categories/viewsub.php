<?php
include "../includes/db.php";

$select="select * from subcat inner join category on subcat.Cat_id = category.Cat_id";
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
            <h1>View a SubCategory <a href="addsub.php" ><button type="button" style="margin-left: 30px" class="btn  btn-primary">ADD SUB-CATEGORY</button></a></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../admin/homepage.php">Home</a></li>
              <li class="breadcrumb-item active">View Sub category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sub Category Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
					<th>CATEGORY_TITLE</th>
                    <th>SUBCATEGORY_TITLE</th>
                    <th>SUBCATEGORY_DESCRIPTION</th>
                    <th>SUBCATEGORY_IMAGE</th>
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
                    <td><?php echo $row['description'] ?></td>
                    
                    <td><img  style="width:50px"src="../assets/MyImages/<?php echo $row['image'] ?>"</td>
					<td><button type="button" class="btn  btn-success"><a style="color:white"href="subedit.php?id=<?php echo $row['id']?>">EDIT</a></button>
		           <button type="button" class="btn  btn-danger"><a  style="color:white" href="subdelete.php?id=<?php echo $row['id']?>"  onclick="showAlert()">DELETE</a></button></td>
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
</script>
</body>
</html>
