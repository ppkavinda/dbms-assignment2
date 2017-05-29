<?php
session_start();
if (!isset($_SESSION["id"]) || !isset($_SESSION["level"])) {
    header("Location: index.php");
    $link = "hide";
}else{
    $link = "";
}

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
    <link rel="stylesheet" href="css/form.css?modified=205209">
    <link rel="stylesheet" href="css/test.css?modified=20094">
    <link rel="stylesheet" href="css/tab.css?modified=200209">
    <link rel="stylesheet" href="css/navbar.css?modified=20209">
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
    <ul class="navbar">
        <li class="navli activenav" onclick="active(this);"><a href="#">home</a></li>
        <li class="navli" onclick="active(this);"><a href="#">tmp1</a></li>
        <li class="navli" onclick="active(this);"><a href="#">tmp2</a></li>
        <li class="navli" onclick="active(this);"><a href="#">tmp3</a></li>
        <li class="space" onclick="active(this);"><a href="#">space</a></li>
        <li class="navli" id="logout"><a href="logout.php" class="<?php echo $link ?>">Log out</a></li>
    </ul>
    <h1>DBMS System</h1>
        <h1>Module page</h1>
        <div class="container-main2">
            <h2>Module details</h2>
            <ul>
                <?php if(isset($str)){echo $str; } ?>
            </ul>
        </div>
        <script src="js/navbar.js"></script>
    </body>
</html>
