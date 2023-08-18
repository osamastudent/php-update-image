<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Swicth</title>
</head>
<body>
<div class="container">
    <h1>Swicth Form</h1>
<form action="" method="POST">
<input type="text" name="switch" class=" form-control" placeholder="enter here..."><br>
<input type="submit"  class="btn btn-primary form-control">
</form>
<br><br>

<h1>Swicth javascript Form</h1>
<form  method="POST">
<input type="text" name="switchh" oninput="getinput()" id="gettext"  class=" form-control" placeholder="enter here..."><br>
<button type="button" onClick="data_submit(this.form)"  class="btn btn-primary">Submit</button>
</form>
<h1>

<h1 id="idd">s</h1>
<p id="seeinput"></p>
</div>
</body>
</html>

<script>
function data_submit(form){
var uname=form.switchh.value;
document.getElementById("idd").innerHTML=uname;
}

function getinput(){
var getinput=document.getElementById("gettext").value;
document.getElementById("seeinput").innerHTML=getinput;
}

</script>

