<?php
session_start();

include_once("config.php");
if(isset($_GET['l_id'])){
    $l_id = $_GET['l_id'];
    $sql = "SELECT l_id, fname, lname, dep_id FROM staff WHERE l_id='$l_id';";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
    }else{
        echo "Error";
    }

}
if(isset($_POST["submit"])){
    $l_id = $_POST["l_id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $department = $_POST["department"];

    $sql1 = "UPDATE staff SET l_id='$l_id', fname='$fname', lname='$lname', dep_id='$department' WHERE l_id='$l_id';";
    $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

    if($result1){
        $_SESSION["msg"]=$sql1;
        header("Location: msg.php");
    }else{
        $msg = "* Falied! ";
    }
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>DBMS- database system</title>
     <link rel="stylesheet" href="../css/form.css?modified=02209">
     <link rel="stylesheet" href="../css/test.css?modified=0211009">
     <link rel="stylesheet" href="../css/tab.css?modified=0202309">
     <link rel="stylesheet" href="../css/navbar.css?modified=032209">
 </head>
 <body>
     <a href="index.php"><h1>DBMS System</h1></a>
     <h1>Registeration page</h1>
     <div class="container-main">
         <div id="signup" class="tabcontent">
             <ul class="tab tabani">
                 <li class="tabLi" ><a style="margin-left: 17%;" id="default" class="tablink" >Register Lecture</a></li>
             </ul>
             <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                 <p style="color: red; margin-left: 5%;">
                     <?php if(isset($msg)) echo $msg; ?>
                 </p>
                 <p>
                     <label for="sign-id">Id:</label>
                     <input type="text" name="id" id="sign-id" placeholder="Enter ID" value="<?php echo $row['l_id']?>" required>
                 </p>
                 <p>
                     <label for="sign-fname">First Name:</label>
                     <input type="name" name="fname" id="sign-fname" placeholder="Enter First name" value="<?php echo $row['fname']?>" required>
                 </p>
                 <p>
                     <label for="sign-lname">Last Name:</label>
                     <input type="text" name="lname" id="sign-lname" placeholder="Enter Last name" value="<?php echo $row['lname']?>" required>
                 </p>
                 <p>
                     <label for="sign-department">Department id:</label>
                     <input type="text" name="department" id="sign-department" placeholder="Department Id" value="<?php echo $row['dep_id']?>" required>
                 </p>
                 <input id="submit" type="submit" name="submit"value="Update" onclick="return validatePassword()">
             </form>
         </div>
     </div>
     </body>
 </html>
