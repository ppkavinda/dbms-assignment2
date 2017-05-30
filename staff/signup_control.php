<?php
if(isset($_POST["submit"])){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    include_once("config.php");
    $sql = "INSERT INTO users(fname, lname, username, password) VALUES ('$fname', '$lname', '$username', '$password')";
    $result = mysqli_query($con, $sql);

    if($result){
        echo "Done.";
    }else{
        echo mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Signed In</title>
        <link rel="stylesheet" href="css/test.css?modified=2011009">
    </head>
    <body>
        <h1>Signed In</h1>
    </body>
</html>
