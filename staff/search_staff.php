<?php
    include_once("config.php");

    if(isset($_POST["submit"]) || isset($_GET["all"])){
        if(isset($_POST["submit"])){
            $search = $_POST["search"];
            $sql = "SELECT DISTINCT * FROM staff WHERE fname LIKE '%$search%' OR lname LIKE '%$search%';";
        }else if(isset($_GET["all"])){
            $sql = "SELECT * FROM staff";
        }
        $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $str= "<table>";
        $str.="<tr><th>id</th><th> name</th><th style='background: #ddd;'></th></tr>";
        while($row = mysqli_fetch_array($result)){
            $str.= "<tr><td><a style='text-decoration: none;' href='staff.php?l_id=$row[l_id]'>$row[l_id]</a></td>";
            $str.= "<td><a style='text-decoration: none;' href='staff.php?l_id=$row[l_id]'>$row[fname]" . " " . "$row[lname]</a></td>";
            $str.= "<td><a href='delete.php?l_id=$row[l_id]'>Delete</a> , <a href='update_staff.php?l_id=$row[l_id]'>Update</a></td></tr>";
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
        <title>Search for staffs</title>
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
                    <input style="margin-bottom: 15px;" type="submit" name="all" value="Show all staff">
                </form>
            </div>
        </div>
        <div class="container">
            <?php if(isset($str)){echo $str;} ?>
            <?php if(isset($err)){echo $err;} ?>
        </div>

    <script src="js/tab.js"></script>
    <script src="js/validation.js"></script>
    </body>
</html>
