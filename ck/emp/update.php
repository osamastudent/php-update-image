<?php
function selectCat(){
    include'conn.php';
$option="";
$selectcategory=mysqli_query($conn,"select * from category");
while($row=mysqli_fetch_array($selectcategory)){

  $option.="<option value='.$row[0].'>$row[1]</option>";

    // echo $row["c_name"];
}
echo $option;
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>add Product</title>
  </head>
  <body>
  <?php
include 'conn.php';
if(isset($_GET["update"])){
  $update_id=$_GET["update"];
$select=mysqli_query($conn,"select * from products where p_id=$update_id");
$row=mysqli_fetch_array($select);
}

if(isset($_POST["updateproduct"])){
$pc_fk_id=$_POST["pc_fk_id"];
$name=$_POST["name"];
$price=$_POST["price"];
$image=$_FILES["image"]["name"];
$old_image=$row["image"];
// $path='productimages/.$old_image';

if(!empty($image)){
if(file_exists('productimages/'.$old_image)){
  unlink('productimages/' . $old_image);
 }
 move_uploaded_file($_FILES["image"]["tmp_name"],'productimages/'.$image);
 $insert=mysqli_query($conn,"update products set pc_fk_id='$pc_fk_id', p_name='$name', p_price='$price', image='$image' where p_id='$update_id'");
 header("location:addproduct.php");
}

  else{
    move_uploaded_file($_FILES["image"]["tmp_name"],'productimages/'.$image);
    $insert=mysqli_query($conn,"update products set pc_fk_id='$pc_fk_id', p_name='$name', p_price='$price', image='$old_image' where p_id='$update_id'");
    header("location:addproduct.php");
  }


}
?>

   

<div class="container">
<div class="row mt-5">


<div class="col-md-12">
  <h1>Update Product</h1>
<form action="" method="post" enctype="multipart/form-data">
    <select name="pc_fk_id"  class="form-control" id="">
        <option value="" class="d-flex">--select--</option>
        <?php  selectCat(); ?>
    </select><br>

<input type="text" name="name" value="<?php  echo $row['p_name']; ?> " class="form-control" placeholder="name" ><br>
<input type="text" name="price" value="<?php  echo $row[2]; ?> " class="form-control" placeholder="price" ><br>
<input type="file" name="image" class="form-control" ><br>
<input type="submit" name="updateproduct" class="btn btn-primary btn-outline-info text-white" value="Update Product">

</div>
      </form> 
     </div>
     <img src="productimages/<?php echo $row['image'] ?>" class="img-thumbnail rounded mx-auto d-block"  height="100">
  </body>
</html>
