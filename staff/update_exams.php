<?php
session_start();
if (isset($_GET['date']) && isset($_GET['mcode'])) {
    include("config.php");
    $date = $_GET['date'];
    $mcode = $_GET['mcode'];
    $sql = "SELECT * FROM exmas WHERE date='$date' AND mcode='$mcode';";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
    }else{
        echo "Error";
    }
}
if(isset($_POST["submit"])){
    $mcode = $_POST["mcode"];
    $date = $_POST["date"];

    include_once("config.php");
    $sql1 = "UPDATE exmas SET date='$date', mcode='$mcode' WHERE date='$date' AND mcode='$mcode';";
    $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

    if($result1){
        $msg = "* registration successed !";
        echo "<script>alert('this is cool.');</script>";
        header("Location: admin.php");
    }else{
        $msg = "* Falied!!";
    }
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>DBMS- database system</title>
     <link rel="stylesheet" href="css/form.css?modified=02209">
     <link rel="stylesheet" href="css/test.css?modified=0211009">
     <link rel="stylesheet" href="css/tab.css?modified=0202309">
     <link rel="stylesheet" href="css/navbar.css?modified=032209">
 </head>
 <body>
     <ul class="navbar">
         <li class="navli activenav" onclick="active(this);"><a href="#">home</a></li>
         <li class="navli" onclick="active(this);"><a href="#">tmp1</a></li>
         <li class="navli" onclick="active(this);"><a href="#">tmp2</a></li>
         <li class="navli" onclick="active(this);"><a href="#">tmp3</a></li>
         <li class="space" onclick="active(this);"><a href="#">space</a></li>
         <li class="navli" id="logout"><a href="logout.php">logout</a></li>
     </ul>
     <h1>DBMS System</h1>
     <h1>Registeration page</h1>
     <div class="container-main">
         <div id="signup" class="tabcontent">
             <ul class="tab tabani">
                 <li class="tabLi" ><a style="margin-left: 17%;" id="default" class="tablink" >Register Student</a></li>
             </ul>
             <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                 <p style="color: red; margin-left: 5%;">
                     <?php if(isset($msg)) echo $msg; ?>
                 </p>
                 <p>
                     <label for="sign-id">Module code:</label>
                     <input type="text" name="mcode" id="sign-id" placeholder="Enter Module code" value="<?php echo $row['mcode'] ?>" required>
                 </p>
                 <p>
                     <label for="sign-fname">Date:</label>
                     <input type="date" name="date" id="sign-date" placeholder="Enter the Date" value="<?php echo $row['date'] ?>" required>
                 </p>
                 <input id="submit" type="submit" name="submit"value="Update">
             </form>
         </div>
     </div>
     <script src="js/validation.js"></script>
     <script src="js/navbar.js"></script>
     </body>
 </html>
