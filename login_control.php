<?php
if(isset($_POST["submit"])){
    include_once("config.php");

    $id = $_POST["id"];
    $password = $_POST["password"];
    $sql = "SELECT id, ulevel FROM users WHERE id = '$id' AND password = '" . md5($password) . "';";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        echo $row["id"];
        echo $row["ulevel"];

        //if details are correct logging in the user
        session_start();
        $_SESSION["id"] = $row['id'];
        $_SESSION["level"] = $row["ulevel"];

        if($_SESSION["level"] == 1){
            header("Location: admin.php");
        }else{
            header("Location: student.php");
        }

    }else{

        echo "You have Failed! #This city.";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Logged In</title>
        <link rel="stylesheet" href="css/test.css?modified=2011009">
    </head>
    <body>
        <h1>Logged In</h1>
    </body>
</html>
