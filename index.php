<?php
if(isset($_POST["submit"])){
    include_once("config.php");

    $id = $_POST["id"];
    $password = $_POST["password"];
    $sql = "SELECT id, ulevel FROM users WHERE id = '$id' AND password = '" . md5($password) . "';";
    $result = mysqli_query($con, $sql);

    if(!isset($_SESSION["id"])) $link = '';

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        echo $row["id"];
        echo $row["ulevel"];

        //if details are correct logging in the user
        session_start();
        $_SESSION["id"] = $row['id'];
        $_SESSION["level"] = $row["ulevel"];
        $link = "";

        if($_SESSION["level"] == 0){
            header("Location: admin.php");
        }else if($_SESSION["level"] == 1){
            header("Location:staff.php?s_id=$row[id]");
        }else{
            header("Location:student.php?s_id=$row[id]");
        }

    }else{
        $link = "* id or password error";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DBMS- database system</title>
        <link rel="stylesheet" href="css/form.css?modified=20529">
        <link rel="stylesheet" href="css/test.css?modified=2011009">
        <link rel="stylesheet" href="css/tab.css?modified=2005209">
    </head>
    <body>
        <h1>DBMS System</h1>
        <div class="container-main">
            <ul class="tab">
                <li class="tabLi" onclick='selTab(event, "login");'><a href="javascript:void(0)" id="default" class="tablink" >Log In</a></li>
            </ul>
            <!-- Login form -->
            <div id="login" class="tabcontent">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <p style="color: red; margin-left: 5%;">
                        <?php if(isset($link)) echo $link; ?>
                    </p>
                    <p id="sp">
                        <label for="log-username">Id:</label>
                        <input type="text" name="id" id="log-username" placeholder="Enter your id" required>
                    </p>
                    <p>
                        <label for="log-password">Password:</label>
                        <input type="password" name="password" id="log-password" placeholder="Password" required>
                    </p>
                        <input id="submit" type="submit" name="submit" value="Log in">
                </form>
            </div>
        </div>

    <script src="js/tab.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/navbar.js"></script>
    </body>
</html>
