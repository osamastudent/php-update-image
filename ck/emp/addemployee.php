
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </head>
  <body>

   


<div class="row mt-5">
<div class="col-md-4"></div>

<div class="col-md-4">
  <h1>login form</h1>
<form action="" method="post">
<input type="text" name="name" class="form-control" placeholder="name" ><br>
<input type="text" name="email" class="form-control" placeholder="email" ><br>
<input type="text" name="password" class="form-control" placeholder="password"><br>
<div class="div offset-7">
<input type="submit" name="addemployee" class="btn btn-primary btn-outline-info text-white" value="Add Employee">

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

if(isset($_POST["addemployee"])){
$name=$_POST["name"];
$email=$_POST["email"];
$pass=$_POST["password"];
$passhash=password_hash($pass,PASSWORD_BCRYPT);
$insert=mysqli_query($conn,"insert into employees values(null,'$name','$email','$passhash')");
if($insert){
header('location:addemployee.php? res=user added successfully');
}
else{
  echo "there is some error";
}
}


?>


  </body>
</html>
