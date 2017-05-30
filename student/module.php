<?php
session_start();


if(isset($_GET["mcode"])){
    include_once("config.php");
    $mcode = $_GET["mcode"];
    $sql1 = "SELECT mcode, title, cr_level, coordinator_id, name FROM module INNER JOIN department ON module.dep_id=department.dep_id WHERE mcode='$mcode';";
    $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

    if(mysqli_num_rows($result1)>0){
        $str = '';
        while($row=mysqli_fetch_assoc($result1)){
            $str .= "<li>Module code: <b>$row[mcode]</b></li>";
            $str .= "<li>Title: <b>$row[title]</b></li>";
            $str .= "<li>Credit Level: <b>$row[cr_level]</b></li>";
            $str .= "<li>Coordinator: <b>$row[coordinator_id]</b></li>";
            $str .= "<li>Department: <b>$row[name]</b></li>";
        }
    }else{
        $str = "<li>No data</li>";
    }
}
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DBMS- database system</title>
    <link rel="stylesheet" href="../css/form.css?modified=205209">
    <link rel="stylesheet" href="../css/test.css?modified=200394">
    <link rel="stylesheet" href="../css/tab.css?modified=200209">
    <link rel="stylesheet" href="../css/navbar.css?modified=20209">
    <style>
        table, th, td{border: 3px solid #ddd; border-collapse: collapse; padding: 10px;}
        table{width: 100%;}
        .container{margin-left: auto; margin-right: auto; width: 50%; display: block;}
        table{background: #888;}
        th{background: #555;}
        li, !.navli{padding: 10px;}
    </style>
</head>
<body>
    <a href="index.php"><h1>DBMS System</h1></a>
        <h1>Module page</h1>
        <div class="container-main2">
            <h2>Module details</h2>
            <ul>
                <?php if(isset($str)){echo $str; } ?>
            </ul>
        </div>
        <div id="msg">
            <?php echo $sql1; ?>
        </div>
    </body>
</html>
