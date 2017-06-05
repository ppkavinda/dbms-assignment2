<?php
session_start();
if(isset($_POST["submit"])){
    $s_id = $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $department = $_POST["dep_id"];
    $password = md5($_POST["password"]);
    $mcode = trim($_POST["mcode"]);
    $r = explode(" ", $mcode);

    include_once("config.php");
    $sql1 = "INSERT INTO staff(l_id, fname, lname, dep_id) VALUES ('$s_id', '$fname', '$lname', '$department');";
    $sql2 = " INSERT INTO users(id, password, ulevel) VALUES ('$s_id', '$password', 1);";
    $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));
    $result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));

    if($result1 && $result2){
        $msg = "* registration successed !";
    }else{
        $msg = "* Falied! ";
    }

    for ($i=0; $i <count($r) ; $i++) {
        $sql1 = "INSERT INTO staff_module(mcode, l_id) VALUES ('$r[$i]', '$s_id');";
        $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

        if($result1){
            $_SESSION["msg"]=$sql1;
            header("Location: msg.php");
        }else{
            echo mysqli_error($con);
        }
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
                 <?php
                 $sql = "SELECT dep_id FROM department;";
                 include_once("config.php");
                 $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                 $str ='';
                 while($row=mysqli_fetch_array($result)){
                     $str .="<option value='$row[dep_id]'>$row[dep_id]</option>";
                 }
                 ?>
                 <p>
                     <label for="sign-mcode">Department id:</label>
                     <select class="input" name="dep_id">
                         <option value="M1">-- Select the Department Id</>
                             <?php echo $str ?>
                     </select>
                 </p>
                 <p>
                     <label for="sign-id">mcode:</label>
                     <input type="text" name="mcode" id="sign-id" placeholder="Module codes (seperate by a space)" required>
                 </p>
                 <input id="submit" type="submit" name="submit"value="Register">
             </form>
         </div>
     </div>
     </body>
 </html>
