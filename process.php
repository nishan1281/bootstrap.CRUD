<?php

session_start();

$mysqli = new mysqli('localhost', 'root', 'anishani', 'crud') or die(mysqli_error($mysqli));

    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $location = $_POST['location'];
        $mysqli->query("INSERT INTO data (name, location) VALUES ('$name', '$location')") or die($mysqli->error);

        $_SESSION['message'] = "Record has been saved";
        $_SESSION['msg_type'] = "success";

        header("Location: index.php");
    }

    if (isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

        $_SESSION['message'] = "Record has been deleted";
        $_SESSION['msg_type'] = "danger";

        header("Location: index.php");
    }




