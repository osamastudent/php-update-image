<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css"> 
    <title>Document</title>
</head>
<body>
    
<div class="container mt-5" >
<table id="example" class="table table-striped" style="width:100%">
<thead>
<th>id</th>
<th>name</th>
<th>email</th>
<th>pass</th>
<th>image</th>
<th>actions</th>
</thead>
<tbody>

<?php
@include'conn.php';
$select=mysqli_query($conn,"select * from users");
$key="";
while($row=mysqli_fetch_array($select)){  
$key++;
?>

<tr>
<td><?php echo $key  ?></td>
<td><?php echo $row[1]  ?></td>
<td><?php echo $row[2]  ?></td>
<td><?php echo $row[3]  ?></td>
<td><img src="images/<?php echo $row[4]  ?>" alt="" height="60"></td>
<td><a href="showusers.php?delete=<?php echo $row[0] ?>" >Delete</a>
<a href="update.php?update= <?php echo $row[0]  ?>">Update</a>
<a href="update.php?deleteall= <?php echo $row[0]  ?>">Delete All</a></td>
 </tr>

 <?php
}
?>

        </tbody>
    </table>
</div>

<script src="//code.jquery.com/jquery-3.7.0.js"></script>
<script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
  $('#example').DataTable({
    // "paging": false,
    // "searching": false,
    // "ordering": false,
  });
});

</script>
</body>
</html>