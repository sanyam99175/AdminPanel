<?php
include "../includes/db.php";

$select="select * from category order by Cat_id DESC";
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
    alert ("Are you sure you want to delete?");
  }
  </script>
</head>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #0da30d;
}

input:focus + .slider {
  box-shadow: 0 0 1px #0da30d;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}


.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}


</style>
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
            <h1>Categories <a href="add.php" ><button type="button" style="margin-left: 30px" class="btn  btn-primary">ADD CATEGORY</button></a></h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../admin/homepage.php">Home</a></li>
              <li class="breadcrumb-item active">View Category</li>
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
                <h3 class="card-title">Category Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>CATEGORY_NAME</th>
                    <th>CATEGORY_TITLE</th>
                    <th>CATEGORY_DESCRIPTION</th>
                    <th>CATEGORY_IMAGE</th>
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
                    <td><?php echo $i ;  ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['Cat_title'] ?></td>
                    <td><?php echo $row['Cat_description'] ?></td>
                    <td><img  style="width:50px" src="../assets/MyImages/<?php echo $row['image'] ?>"></td>
                    <?php 
               if($row['status']=='0')
               {
                 ?>
               <td> <label class="switch">
                     <input type="checkbox"  id="toggle" onclick="stchange(<?php echo $row['Cat_id']   ?>)">
                     <span class="slider round"></span>
                    </label>  </td>
                    <?php } 
                    else{ ?>
                     <td> <label class="switch">
                     <input type="checkbox"  id="toggle" onclick="stchange(<?php echo $row['Cat_id']   ?>)" checked>
                     <span class="slider round"></span>
                    </label>  </td>
                    <?php
                    }
                    ?>
					<td><button type="button" class="btn  btn-success"><a style="color:white"href="edit.php?id=<?php echo $row['Cat_id']?>">EDIT</a></button>
		           <button type="button" class="btn  btn-danger"><a  style="color:white" href="delete.php?id=<?php echo $row['Cat_id']?>"  onclick="showAlert()">DELETE</a></button></td>
             
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

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/jszip/jszip.min.js"></script>
<script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
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
<script>



function stchange(ids){
  var id = ids;
  console.log(id);
            $.ajax({
                type: "post",
                url: "status.php",
                data: {"id": id },
                success: function (data) {
                  
                  if(data==1){
                     alert("Category Activated");
                  }
                  else
                  {
                    alert("Category Deactivated");
                  }
                  
                    
                }
            });
       
}


    </script>
</body>
</html>
