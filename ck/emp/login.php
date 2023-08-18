<?php
session_start();
if(isset($_SESSION["email"])){
header('location:addproduct.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>
<body>

<?php
include'conn.php';

if(isset($_POST["login"])){
$email=$_POST["email"];
$pass=$_POST["password"];
$select=mysqli_query($conn,"select * from employees where email='$email'");

if(empty($email)){
$error="please enter your email";
}
else if(empty($pass)){
$error="please enter password";
}

else{
if($select){
if(mysqli_num_rows($select)>0){
$row=mysqli_fetch_array($select);
if(password_verify($pass,$row["password"])){
$_SESSION['email']=$row['email'];
header('location:addproduct.php');
}
}
}
else{
echo "Not Login";
}
}
}
?>

<div class="container">
    <h1>Login Form</h1>
<form action="" method="POST">
<input type="text" name="email" class=" form-control" placeholder="Email"><br>
<input type="password" name="password" id="pass" class=" form-control" placeholder="Password">
<i class="fa-solid fa-eye float-end px-5" id="eye" style="margin-top: -26px;"></i>

<br>
<input type="submit" name="login" class="btn btn-primary form-control">
</form>
<h1><?php 
if(isset($error)){
    echo $error ;
}

?></h1>

</div>
</body>
</html>

<script>
var pass=document.getElementById("pass");
var eye=document.getElementById("eye");
eye.addEventListener("click",function(){
if(pass.type==="password"){
pass.type="text";
eye.classList.remove("fa-eye");
eye.classList.add("fa-eye-slash");
}
else{
    eye.classList.add("fa-eye");
eye.classList.remove("fa-eye-slash");
    pass.type="password";
}
});
</script>
<!-- <i class="fa-solid fa-eye-slash"></i> -->