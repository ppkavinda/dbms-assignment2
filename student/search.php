<?php
    include_once("config.php");

    if(isset($_POST["submit"]) || isset($_GET["all"])){
        if(isset($_POST["submit"])){
            $search = $_POST["search"];
            $sql = "SELECT * FROM students INNER JOIN diploma ON students.d_id=diploma.d_id WHERE fname LIKE '%$search%' OR lname LIKE '%$search%'";
        }else if(isset($_GET["all"])){
            $sql = "SELECT * FROM all_students";
        }
        $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $str= "<table>";
        $str.="<tr><th>id</th><th> name</th><th>address</th><th>diploma</th><th style='background: #ddd;'></th></tr>";
        while($row = mysqli_fetch_array($result)){
            $str.= "<tr><td><a style='text-decoration: none;' href='student.php?s_id=$row[s_id]'>$row[s_id]</a></td>";
            $str.= "<td><a style='text-decoration: none;' href='student.php?s_id=$row[s_id]'>$row[fname]" . " " . "$row[lname]</a></td>";
            $str.= "<td>$row[address2]</td><td>$row[name]</td>";
            $str.= "<td><a href='delete.php?s_id=$row[s_id]'>Delete</a> , <a href='update_student.php?s_id=$row[s_id]'>Update</a></td></tr>";
        }
        $str.= "</table>";
    }else{
        $err = "<p style='font-size: 40px;'>No records matched.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Search for students</title>
        <link rel="stylesheet" href="../css/form.css?modified=205209">
        <link rel="stylesheet" href="../css/test.css?modified=203009">
        <link rel="stylesheet" href="../css/tab.css?modified=200209">
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
        <div class="container-main">
            <ul class="tab">
                <li class="tabLi" onclick='selTab(event, "login");'><a href="javascript:void(0)" id="default" class="tablink" >Search</a></li>
            </ul>
            <!-- Login form -->
            <div id="login" class="tabcontent">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <p id="sp">
                        <label for="log-username">Search:</label>
                        <input type="search" name="search" id="search" placeholder="Enter a name for search" required>
                    </p>
                        <input id="submit" type="submit" name="submit" value="Search">
                </form>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                    <input style="margin-bottom: 15px;" type="submit" name="all" value="Show all students">
                </form>
            </div>
        </div>
        <div class="container">
            <?php if(isset($str)){echo $str;} ?>
            <?php if(isset($err)){echo $err;} ?>
        </div>
        <div id="msg">
            <?php if (isset($sql)) {
                echo $sql;
            } ?>
        </div>
    </body>
</html>
