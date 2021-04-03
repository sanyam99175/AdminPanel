<?php
session_start();
include "../includes/db.php";
include "../includes/header.php";

$id = $_GET['id'];
$select = "select * from category inner join subcat on category.Cat_id=subcat.Cat_id inner join products on subcat.id=products.SubCat_id where Cat_id='$id'  ";
$run = mysqli_query($cn, $select);
$data = mysqli_fetch_array($run);
$Cat_id = $data['Cat_id'];
$selects = "select * from category";
$runs = mysqli_query($cn, $selects);
$selectss = "select * from subcat";
$runss = mysqli_query($cn, $selectss);
if (isset($_POST['update'])) {
    $title = $_POST['prtitle'];
    $desct = $_POST['prdes'];
    $cat = $_POST['category'];
	$scat= $_POST['subcategory'];
    if ($cat != 0 && $scat!=0) {
        $update = "update products set Cat_id='$cat', SubCat_id='$scat', title='$title',description='$desct' where id='$id'";
    } else {
        $update = "update products set Cat_id='$Cat_id',SubCat_id='$scat', title='$title',description='$desct' where id='$id'";
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
                    <h1 class="m-0">Edit a Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../admin/homepage.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="form">
            <form enctype="multipart/form-data" method="post">
                <label class="d-block">Category's Name</label>
                <select class="form-group col-11 p-2 ml-3" name="category" id="category" class="form-control">
                    <option value="<?php echo 0 ?>">Choose</option>
                    <?php while ($datas = mysqli_fetch_array($runs)) {
                    ?>
                        <option value="<?php echo $datas['Cat_id'] ?>"> <?php echo $datas['name'] ?> </option>
                    <?php } ?>
                </select>
				                <label class="d-block">Sub Category's Name</label>
                <select class="form-group col-11 p-2 ml-3" name="subcategory" id="subcategory" class="form-control">
                    <option value="<?php echo 0 ?>">Choose</option>
                    <?php while ($datass = mysqli_fetch_array($runss)) {
                    ?>
                        <option value="<?php echo $datass['Cat_id'] ?>"> <?php echo $datass['title'] ?> </option>
                    <?php } ?>
                </select>
                <label for="product_title" class="d-block">Category Title</label>
                <input type="text" class="form-control col-11 mb-3  ml-3" name="prtitle" value="<?php echo $data['title'] ?>">
                <label for="product_desc">Category Description</label>
                <input type="text" class="form-control mb-3 ml-3 col-11" name="prdes" value="<?php echo $data['description'] ?>">
                <label for="product_image">Category Image</label>
                <input type="file" name="primage" class="ml-3 mb-3">
                <button type="submit" class="btn btn-danger d-block col-1 ml-3" name="update">UPDATE</button>
            </form>
        </div>
    </header>
</div>
<?php
include "../includes/footer.php";
?>