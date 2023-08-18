<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 

    <title>filter</title>
</head>
<body>

<h1>filter</h1>
<form action="" method="GET">
    <div class="input-group">
    <input type="text" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
    <button>Search</button>
    <a href="filter.php" class="btn">back</a>
    </div>
</form>
<table class="table table-striped table-bordered" style="width:100%">
        <thead>
    <tr>
      <th>index</th>
      <th>name</th>
      <th>Email</th>
      <th>Password</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>

<?php
include 'conn.php';

if (isset($_GET["search"])) {
    $search = $_GET["search"];

    if (!empty($search)) {
        $fetchvalues = mysqli_query($conn, "SELECT * FROM users WHERE CONCAT(email, name) LIKE '%$search%'");

        if (mysqli_num_rows($fetchvalues) > 0) {
            $key = "";
            while ($row = mysqli_fetch_row($fetchvalues)) {
                $key++;
                ?>
                <tr>
                    <td><?php echo $key ?></td>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                </tr>
                <?php
            }
        } else {
            $error = "No records found";
        }
    } else {
        $error = "Please enter something";
    }
} else {
    $fetchvalues = mysqli_query($conn, "SELECT * FROM users");

    if (mysqli_num_rows($fetchvalues) > 0) {
        $key = "";
        while ($row = mysqli_fetch_row($fetchvalues)) {
            $key++;
            ?>
            <tr>
                <td><?php echo $key ?></td>
                <td><?php echo $row[1] ?></td>
                <td><?php echo $row[2] ?></td>
            </tr>
            <?php
        }
    } else {
        $error = "No records found";
    }
}

if (isset($error)) {
    ?>
    <tr>
        <td colspan="5" class="text-center"><?php echo $error ?></td>
    </tr>
    <?php
}
?>

  </tbody>
</table>
</body>
</html>
