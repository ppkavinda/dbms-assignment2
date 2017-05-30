<?php
include_once("config.php");

$sql = "SELECT date, title, exmas.mcode FROM exmas INNER JOIN module ON exmas.mcode=module.mcode;";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result)>0){
    $str= "<table>";
    $str.="<tr><th>Date</th><th>Module</th><th style='background: #ddd;'></th></tr>";
    while($row = mysqli_fetch_array($result)){
        $str.= "<tr><td>$row[date]</td>";
        $str.= "<td>$row[title]</td>";
        $str.= "<td><a href='delete.php?date=$row[date]&mcode=$row[mcode]'>Delete</a>";
        $str.= ", <a href='update_exams.php?date=$row[date]&mcode=$row[mcode]'>Update</a></td></tr>";
    }
    $str.= "</table>";
}else{
    $err = "<p style='font-size: 40px;'>No records matched.</p>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Search for students</title>
        <link rel="stylesheet" href="css/form.css?modified=205209">
        <link rel="stylesheet" href="css/test.css?modified=20009">
        <link rel="stylesheet" href="css/tab.css?modified=200209">
        <style>
            table, th, td{border: 3px solid #ddd; border-collapse: collapse; padding: 10px;}
            table{width: 100%;}
            .container{margin-left: auto; margin-right: auto; width: 50%; display: block;}
            table{background: #888;}
            th{background: #555;}
        </style>
    </head>
    <body>
        <h1>DBMS System</h1>

        <div class="container">
            <?php if(isset($str)){echo $str;} ?>
            <?php if(isset($err)){echo $err;} ?>
        </div>

    <script src="js/tab.js"></script>
    <script src="js/validation.js"></script>
    </body>
</html>
