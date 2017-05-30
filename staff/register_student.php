<?php
session_start();
if(isset($_POST["submit"])){
    $s_id = $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $diploma = $_POST["diploma"];
    $password = md5($_POST["password"]);

    include_once("config.php");
    $sql1 = "INSERT INTO students(s_id, fname, lname, address1, address2, d_id) VALUES ('$s_id', '$fname', '$lname', '$address1', '$address2', '$diploma');";
    $sql2 = " INSERT INTO users(id, password, ulevel) VALUES ('$s_id', '$password', 2);";
    $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));
    $result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));

    if($result1 && $result2){
        $msg = "* registration successed !";
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
                     <label for="sign-id">Id:</label>
                     <input type="text" name="id" id="sign-id" placeholder="Enter ID" required>
                 </p>
                 <p>
                     <label for="sign-fname">First Name:</label>
                     <input type="name" name="fname" id="sign-fname" placeholder="Enter First name" required>
                 </p>
                 <p>
                     <label for="sign-lname">Last Name:</label>
                     <input type="text" name="lname" id="sign-lname" placeholder="Enter Last name" required>
                 </p>
                 <p>
                     <label for="sign-address1">Address line 1:</label>
                     <input type="text" name="address1" id="sign-address1" placeholder="Enter address line 1" required>
                 </p>
                 <p>
                     <label for="sign-address2">Address line 2:</label>
                     <input type="text" name="address2" id="sign-address2" placeholder="Enter address line 2" required>
                 </p>
                 <p>
                     <label for="sign-diploma">Diploma:</label>
                     <input type="text" name="diploma" id="sign-diploma" placeholder="Diploma Id" required>
                 </p>
                 <p>
                     <label for="sign-password">Password:</label>
                     <input type="password" name="password" id="sign-password" placeholder="Create a Password" required>
                 </p>
                 <p>
                     <label for="sign-password">Re-enter password:</label>
                     <input type="password" name="password" id="sign-re-password" placeholder="Re-enter password" required>
                 </p>
                 <input id="submit" type="submit" name="submit"value="Register" onclick="return validatePassword()">
             </form>
         </div>
     </div>
     <script src="js/validation.js"></script>
     <script src="js/navbar.js"></script>
     </body>
 </html>
