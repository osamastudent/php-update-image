<?php
session_start();
if(isset($_SESSION["email"])){

}
else{
  header('location:login.php');
}
?>

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

 
<h1>welcome to:<?php echo $_SESSION['email']; ?> </h1>
<a href="logout.php">Log out</a>
<div class="row mt-5">
<div class="col-md-4"></div>

<div class="col-md-4">
  <h1>Add Product</h1>
<form action="" method="post" enctype="multipart/form-data">
    <select name="pc_fk_id" class="form-control" id="">
        <option value="" class="d-flex">--select--</option>
        <?php  selectCat(); ?>
    </select><br>
<input type="text" name="name" class="form-control" placeholder="name" ><br>
<input type="text" name="price" class="form-control" placeholder="price" ><br>
<input type="file" name="image" class="form-control" ><br>
<input type="submit" name="addproduct" class="btn btn-primary btn-outline-info text-white" value="Add Product">

</div>
      </form> 
 <?php
if(isset($_GET["res"])){
$res=$_GET["res"];
echo "<h1> $res </h1>";
}
?> 
</div>
<div class="col-md-4"></div>
</div>

<?php
include 'conn.php';

if(isset($_POST["addproduct"])){
$name=$_POST["name"];
$pc_fk_id=$_POST["pc_fk_id"];
$email=$_POST["price"];
$image=$_FILES["image"]["name"];
// $hashpass=password_hash($pass,PASSWORD_BCRYPT);
$allowedextension=array('jpg','jpeg');
$filename=$_FILES["image"]["name"];
$pathinfo=pathinfo($filename,PATHINFO_EXTENSION);

if(!in_array($pathinfo,$allowedextension)){
echo "jpg and jpeg allowed only";
}
elseif($_FILES['image']['size']>351024){
echo "can not allowed more than 1mb";
}
else{
move_uploaded_file($_FILES["image"]["tmp_name"],'productimages/'.$image);
$insert=mysqli_query($conn,"insert into products values(null,'$pc_fk_id','$name','$email','$image')");
if($insert){
    header('location:addproduct.php? res=product added successfully');
    }
    else{
      echo "there is some error";
    }
}

}
?>

<div class="container">
<table class="table">
<thead>
<th>Index</th>
<th>Category Name</th>
<th>product name</th>
<th>product price</th>
<th>product image</th>
</thead>
<tbody>
<?php
// $show=mysqli_query($conn,"select cat.c_name ,pro.p_name, pro.p_price, pro.image from  products as pro
// JOIN
// category AS cat
// ON
// cat.id=pro.pc_fk_id;
// ");

$show=mysqli_query($conn,"select * from products");

$key="";
while($showall=mysqli_fetch_array($show)){
    $key++;
?>

<tr>
    <td><?php echo $key; ?></td>
    <!-- <td><?php echo $showall["c_name"] ?></td> -->
    <td><?php echo $showall["p_name"] ?></td>
<td><?php echo $showall["p_price"] ?></td>
<td><img src="productimages/<?php echo $showall["image"] ?>" height="50"></td>
<td><a href="addproduct.php?delete=<?php echo $showall['p_id'] ?>" onclick="confirm('do you want to delete')">Delete</a></td>
<td><a href="update.php?update=<?php echo $showall[0] ?>">Update</a></td>
<td><a href="addproduct.php?deleteall">Delete All</a></td>
</tr>

<?php
}
?>

<?php 
if(isset($_GET["delete"])){
$delete=$_GET["delete"];


$select=mysqli_query($conn,"select * from products where p_id=$delete");
$row=mysqli_fetch_assoc($select);
$old=$row["image"];

if(file_exists('productimages/'.$old)){
unlink('productimages/'.$old);
}
$deleted=mysqli_query($conn,"delete from products where p_id=$delete");
header("location:addproduct.php");
}


if(isset($_GET["deleteall"])){

  $select=mysqli_query($conn,"select * from products");
  while($row=mysqli_fetch_array($select)){
  $old=$row["image"];

  if(file_exists('productimages/'.$old)){
  unlink('productimages/'.$old);
  }
}
  $deleteall=mysqli_query($conn,"delete  from products");
  if($deleteall){
  header('location:addproduct.php');
  }
    }
?>

</tbody>
</table>

</div>
  </body>
</html>
