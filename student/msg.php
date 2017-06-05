<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DBMS- database system</title>
    <link rel="stylesheet" href="../css/form.css?modified=02209">
    <link rel="stylesheet" href="../css/test.css?modified=02009">
    <link rel="stylesheet" href="../css/tab.css?modified=022309">
    <link rel="stylesheet" href="../css/navbar.css?modified=022309">
    <style media="screen">
        #msg{font-size: 30px; color: black; font-weight: bold; margin: 10%;}
    </style>
</head>
<body>
    <a href="index.php"><h1>SQL query</h1></a>
    <div id="msg">
        <?php echo $_SESSION["msg"] . "<br><br>"; ?>
        <?php if(isset($_SESSION["msg2"])){echo $_SESSION["msg2"];}
            $_SESSION["msg2"] = "";
        ?>
    </div>
    </body>
</html>
