<?php
session_start();
include "../includes/db.php";
include "../includes/header.php";

$id = $_GET['id'];
$select = "select * from category inner join subcat ON category.Cat_id=subcat.Cat_id where id='$id'";
$run = mysqli_query($cn, $select);
$data = mysqli_fetch_array($run);
$Cat_id = $data['Cat_id'];
$selects = "select * from category";
$runs = mysqli_query($cn, $selects);
if (isset($_POST['update'])) {
    $title = $_POST['sctitle'];
    $desct = $_POST['scdes'];
    $cat = $_POST['category'];
    if ($cat != 0) {
        $update = "update subcat set Cat_id='$cat', title='$title',description='$desct' where id='$id'";
    } else {
        $update = "update subcat set Cat_id='$Cat_id', title='$title',description='$desct' where id='$id'";
    }
    mysqli_query($cn, $update);
    echo '<script>location.assign("viewsub.php")</script>';
}
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Sub Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../admin/homepage.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit SubCategory</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="form">
            <form enctype="multipart/form-data" method="post">
                <label class="d-block">Category's Name</label>
                <select class="form-group col-11 p-2 ml-3" name="category" class="form-control">
                    <option value="<?php echo 0 ?>">Choose</option>
                    <?php while ($datas = mysqli_fetch_array($runs)) {
                    ?>
                        <option value="<?php echo $datas['Cat_id'] ?>"> <?php echo $datas['name'] ?> </option>
                    <?php } ?>
                </select>
                <label for="product_title" class="d-block">Category Title</label>
                <input type="text" class="form-control col-11 mb-3  ml-3" name="sctitle" value="<?php echo $data['title'] ?>">
                <label for="product_desc">Category Description</label>
                <input type="text" class="form-control mb-3 ml-3 col-11" name="scdes" value="<?php echo $data['description'] ?>">
                <label for="product_image">Category Image</label>
                <input type="file" name="scimage" class="ml-3 mb-3">
                <button type="submit" class="btn btn-danger d-block col-1 ml-3" name="update">UPDATE</button>
            </form>
        </div>
    </header>
</div>
<?php
include "../includes/footer.php";
?>