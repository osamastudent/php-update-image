
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </head>
  <body>

   


<div class="row mt-5">
<div class="col-md-4"></div>

<div class="col-md-4">
  <h1>add category</h1>
<form action="" method="post">
<input type="text" name="name" class="form-control" placeholder="name" ><br>

<input type="submit" name="addcategory" class="btn btn-primary btn-outline-info text-white" value="Add Category">

</div>
      </form> 
<?php  
if(isset($_GET["message"])){
$message=$_GET["message"];
echo "<h1> $message </h1>";
}
?>
</div>
<div class="col-md-4"></div>
</div>

<?php
include 'conn.php';

if(isset($_POST["addcategory"])){
$name=$_POST["name"];

$insert=mysqli_query($conn,"insert into category values(null,'$name')");
if($insert){
    header('location:addcategory.php?message=Category Added Successfully')  ;
    // echo  $message="Category Added Successfully";
        
        }
        else{
            $message="Error";
        }
}


?>


  </body>
</html>
