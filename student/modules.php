<?php
session_start();
if (!isset($_SESSION["id"]) || !isset($_SESSION["level"])) {
    header("Location: index.php");
    $link = "hide";
}else{
    $link = "";
}

include_once("config.php");
$sql1 = "SELECT mcode, title, cr_level, coordinator_id, name FROM module INNER JOIN department ON module.dep_id=department.dep_id";
$result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

if(mysqli_num_rows($result1)>0){
    $str = '<tr>';
    while($row=mysqli_fetch_assoc($result1)){
        $str .= "<td>$row[mcode]</td>";
        $str .= "<td>$row[title]</td>";
        $str .= "<td>$row[cr_level]</td>";
        $str .= "<td>$row[coordinator_id]</td>";
        $str .= "<td>$row[name]</td>";
        $str .= "<td><a style='padding:0' href='delete.php?mcode=$row[mcode]'>Delete</a>or <a style='padding:0' href='update_module.php?mcode=$row[mcode]'>Update</a></td>";
        $str .="</tr>";
    }
}else{
    $str = "<tr>No data</tr>";
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
        table, th, td{border: 3px solid #ddd; border-collapse: collapse; padding: 5px;}
        table{width: 100%;}
        .container{margin-left: auto; margin-right: auto; width: 60%; display: block;}
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
        </div>
        <div class="container">
            <table>
                <tr>
                    <td><b>Module code</b></td><td><b>Title</b></td><td><b>Credit Level</b></td><td><b>Coordinator</b></td><td><b>Department</b></td><th style='background: #ddd;'></th>
                </tr>
                <?php if(isset($str)){echo $str; } ?>
            </table>
        </div>
        <script src="js/navbar.js"></script>
    </body>
</html>
