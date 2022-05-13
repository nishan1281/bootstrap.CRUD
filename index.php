<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
        <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php require_once 'process.php' ?>

<?php if(isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>" role="alert" >

        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>

<?php endif ?>

<?php
    $mysqli = new mysqli('localhost', 'root', 'anishani', 'crud') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
?>

<div class="container">
<div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Location</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
         <?php while ($row = $result->fetch_assoc()): ?>
         <tr>
            <td><?php echo $row ['name']?></td>
            <td><?php echo $row ['location']?></td>
            <td>
                <a href="index.php?edit= <?php echo $row['id']?>"
                        class="btn btn-primary"> Edit</a>
                <a href="process.php?delete= <?php echo $row['id']?>"
                        class="btn btn-danger"> Delete</a>
            </td>
         </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>



<div style="display: flex; align-items: center; justify-content: center;">
<form action="process.php" method="post">
    <div class="mb-3" >
    <label> Name: </label>
        <input type="text" class="form-control" placeholder="enter your name" name="name" >
    </div>

    <div class="mb-lg-2">
        <label> Location: </label>
        <input type="text" class="form-control" placeholder="enter your location" name="location" >
    </div>
</br>
    <div class="col-auto" style="margin-bottom: 10px">
        <button type="submit" name="save"  class="btn btn-primary"> Save </button>
    </div>

</form>
</div>
</div>

</body>
</html>