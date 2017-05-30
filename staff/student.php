<?php
session_start();

if(isset($_GET["s_id"])){
    include_once("config.php");
    $s_id = $_GET["s_id"];
    $sql1 = "SELECT date, student_exam.mcode, grade, title FROM student_exam INNER JOIN module ON student_exam.mcode=module.mcode WHERE student_exam.s_id='$s_id';";
    $sql2 = "SELECT mcode, title FROM module WHERE d_id=(SELECT d_id FROM students WHERE s_id='$s_id');";
    $sql3 = "SELECT s_id, fname, lname, address1, address2, diploma.name FROM students INNER JOIN diploma ON students.d_id=diploma.d_id WHERE s_id='$s_id';";
    $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));
    $result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));
    $result3 = mysqli_query($con, $sql3) or die(mysqli_error($con));

    if(mysqli_num_rows($result1)>0){
        $str = '';
        while($row=mysqli_fetch_assoc($result1)){
            $str .= "<tr style='margin: 10px;'><td>$row[date]</td><td>$row[title]</td><td>$row[grade]</td></tr>";
        }
    }else{
        $str = "<tr><td style='border: none;'>No data</td></tr>";
    }
    $str2 = '';
    if(mysqli_num_rows($result2)>0){
        while($row=mysqli_fetch_assoc($result2)){
            $str2 .="<li style='margin: 10px; '><a href='module.php?mcode=$row[mcode]'>$row[title]</a></li>";
        }
    }else{
        $str2 = "No data";
    }
    if(mysqli_num_rows($result3)>0){
        $str3 = '';
        while($row=mysqli_fetch_assoc($result3)){
            $str3 .= "<li>Student Id: <b>$row[s_id]</b></li>";
            $str3 .= "<li>Name: <b>$row[fname] "." "."$row[lname]</b></li>";
            $str3 .= "<li>Address: <b>$row[address1]"." "."$row[address2]</b></li>";
            $str3 .= "<li>Diploma: <b>$row[name]</b></li>";
        }
    }
}
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DBMS- database system</title>
    <link rel="stylesheet" href="../css/form.css?modified=205209">
    <link rel="stylesheet" href="../css/test.css?modified=204094">
    <link rel="stylesheet" href="../css/tab.css?modified=200209">
    <link rel="stylesheet" href="../css/navbar.css?modified=20209">
    <style>
        table, th, td{border: 3px solid #ddd; border-collapse: collapse; padding: 10px;}
        table{width: 100%;}
        .container{margin-left: auto; margin-right: auto; width: 50%; display: block;}
        table{background: #888;}
        th{background: #555;}
    </style>
</head>
<body>
    <a href="index.php"><h1>DBMS System</h1></a>
        <h1>Student page</h1>
        <div class="container-main2">
            <h2>Student details</h2>
            <ul>
                <?php if(isset($str3)){echo $str3; } ?>
            </ul>
        </div>
        <div id="msg">
            <?php echo $sql3 ?>
        </div>
        <div class="container-main2">
            <h2>Exam Results</h2>
            <table>
                <tr>
                    <th>date</th><th>module</th><th>grade</th>
                </tr>
                    <?php if(isset($str)){echo $str; } ?>
            </table>
        </div>
        <div id="msg">
            <?php echo $sql1 ?>
        </div>
        <div class="container-main2">
            <h2>Modules taken</h2>
            <ul>
                <?php echo $str2 ?>
            </ul>
        </div>
        <div id="msg">
            <?php echo $sql2 ?>
        </div>
    </body>
</html>
