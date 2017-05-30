<?php
if(isset($_POST["submit"])){
    include_once("config.php");

    $search = $_POST["search"];
    $sql = "SELECT * FROM users WHERE fname LIKE '%$search%' OR lname LIKE '%$search%'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $str= "<table>";
        $str.="<tr><th>id</th><th>first name</th><th>last name</th><th>username</th></tr>";
        while($row = mysqli_fetch_array($result)){
            $str.= "<tr><td>$row[id]</td><td>$row[fname]</td><td>$row[lname]</td><td>$row[username]</td></tr>";
        }
        $str.= "</table>";
    }else{
        echo "<style>html{font-size: 40px;}</style>";
        echo "No records matched.";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Search Results</title>
        <style>
            html{background: #f2f2f2; font-family: sans-serif;}
            table, th, td{border: 1px solid red; border-collapse: collapse; padding: 10px;}
            table{width: 100%;}
            .container{margin-left: auto; margin-right: auto; width: 50%; display: block;}
        </style>
    </head>
    <body>
        <div class="container">
            <?php if(isset($str)){echo $str;} ?>
        </div>
    </body>
</html>
