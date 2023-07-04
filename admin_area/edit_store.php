<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
  
<?php

if(isset($_GET['edit_store'])){

$edit_id = $_GET['edit_store'];

$get_store = "select * from store where store_id='$edit_id'";

$run_store = mysqli_query($con,$get_store);

$row_store = mysqli_fetch_array($run_store);

$store_id = $row_store['store_id'];

$store_title = $row_store['store_title'];

$store_image = $row_store['store_store'];

$store_desc = $row_store['store_desc'];

$store_button = $row_store['store_button'];

$store_url = $row_store['store_url'];

$new_s_image = $row_store['store_image'];


}

?>  

<div class="row" >

<div class="col-lg-12" > 

<ol class="breadcrumb">

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Edit store

</li>

</ol>

</div>

</div>

<div class="row">

<div class="col-lg-12">

<div class="panel panel-default">

<div class="panel-heading">
<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit store

</h3>

</div>

<div class="panel-body">

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

<div class="form-group">

<label class="col-md-3 control-label"> store Title : </label>

<div class="col-md-6">

<input type="text" name="store_title" class="form-control" value="<?php echo $store_title; ?>">

</div>

</div>



<div class="form-group">

<label class="col-md-3 control-label"> store Image : </label>

<div class="col-md-6">

<input type="file" name="store_image" class="form-control">

<br>

<img src="store_images/<?php echo $store_image; ?>" width="70" height="70" >

</div>

</div>


<div class="form-group">

<label class="col-md-3 control-label"> store Description : </label>

<div class="col-md-6">

<textarea name="store_desc" class="form-control" rows="10" cols="19">

<?php echo $store_desc; ?>

</textarea>

</div>

</div>


<div class="form-group">

<label class="col-md-3 control-label"> store Button : </label>

<div class="col-md-6">

<input type="text" name="store_button" class="form-control" value="<?php echo $store_button; ?>">

</div>

</div>

<div class="form-group">

<label class="col-md-3 control-label"> store Url : </label>

<div class="col-md-6">

<input type="url" name="store_url" class="form-control" value="<?php echo $store_url; ?>">

</div>

</div>

<div class="form-group">

<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

<input type="submit" name="update" value="Update store" class="btn btn-primary form-control">

</div>

</div>


</form>

</div>

</div>

</div>

</div>

<?php

if(isset($_POST['update'])){

$store_title = $_POST['store_title'];

$store_desc = $_POST['store_desc'];

$store_button = $_POST['store_button'];

$store_url = $_POST['store_url'];

$store_image = $_FILES['store_image']['name'];

$tmp_image = $_FILES['store_image']['tmp_name'];

if(empty($store_image)){

$store_image = $new_s_image;

}

move_uploaded_file($tmp_image,"store_images/$store_image");

$update_store = "update store set store_title='$store_title',store_image='$store_image',store_desc='$store_desc',store_button='$store_button',store_url='$store_url' where store_id='$store_id'";

$run_store = mysqli_query($con,$update_store);

if($run_store){

echo "<script>alert('One store Column Has Been Updated')</script>";

echo "<script>window.open('index.php?view_store','_self')</script>";

}

}

?>

<?php } ?>