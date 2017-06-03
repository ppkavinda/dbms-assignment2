<?php
session_start();
// if (!isset($_SESSION["id"]) || !isset($_SESSION["level"])) {
//     header("Location: index.php");
//     $link = "hide";
// }else{
//     $link = "";
// }

include_once("config.php");
$sql1 = "SELECT * FROM `all_modules`";
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
    <link rel="stylesheet" href="../css/form.css?modified=205209">
    <link rel="stylesheet" href="../css/test.css?modified=203094">
    <link rel="stylesheet" href="../css/tab.css?modified=200209">
    <link rel="stylesheet" href="../css/navbar.css?modified=20209">
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
    <a href="index.php"><h1>DBMS System</h1></a>
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
        <div id="msg">
            <?php echo $sql1; ?>
        </div>
    </body>
</html>
