<?php
session_start();
if (isset($_GET['mcode'])) {
    include_once("config.php");
    $mcode = $_GET['mcode'];
    $sql = "SELECT * FROM module WHERE mcode='$mcode';";
    $result = mysqli_query($con, $sql);
    if($result){
        $row1 = mysqli_fetch_assoc($result);
    }
}
if(isset($_POST["submit"])){
    $mcode = $_POST["mcode"];
    $cr_level = $_POST["cr_level"];
    $title = $_POST["title"];
    $l_id = $_POST["l_id"];
    $d_id = $_POST["d_id"];
    $dep_id = $_POST["dep_id"];
    $sem = $_POST["sem"];

    include_once("config.php");
    // $sql1 = "INSERT INTO exmas(mcode, date) VALUES ('$mcode', '$date');";
    $sql2 = "UPDATE module SET mcode='$mcode', cr_level='$cr_level', coordinator_id='$l_id', d_id='$d_id', dep_id='$dep_id', semester='$sem' WHERE mcode='$mcode';";
    // $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));
    $result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));

    if(/* $result1 && */ $result2){
        // echo '<script>alert("UPDATE module SET mcode=' . $mcode . ', cr_level=' . $cr_level. ', coordinator_id='.$l_id.', d_id='.$d_id.', dep_id='.$dep_id.', semester='.$sem.' WHERE mcode='.$mcode.'");</script>';
        echo '<script>alert("'.$sql2.'")</script>';
    }else{
        $msg = "* insertion failed !";
        // echo mysqli_error($con);
    }
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>DBMS- database system</title>
     <link rel="stylesheet" href="css/form.css?modified=023209">
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
                 <li class="tabLi" ><a style="margin-left: 17%;" id="default" class="tablink" >Enter results</a></li>
             </ul>
             <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                 <p style="color: green; margin-left: 5%;">
                     <?php if(isset($msg)) echo $msg; ?>
                 </p>
                 <p>
                     <label for="sign-mcode">Module Code:</label>
                     <input type="text" name="mcode" id="sign-mcode" placeholder="Enter Module Code" value="<?php echo $row1['mcode'] ?>" required>
                 </p>
                 <p>
                     <label for="sign-title">Titlle:</label>
                     <input type="text" name="title" id="sign-title" placeholder="Enter Module title" value="<?php echo $row1['title'] ?>" required>
                 </p>
                 <p>
                     <label for="sign-cr-level">Credit level:</label>
                     <input type="text" name="cr_level" id="sign-cr-level" placeholder="Enter Credit Level" value="<?php echo $row1['cr_level'] ?>" required>
                 </p>
                 <?php
                 $sql = "SELECT l_id FROM staff;";
                 include_once("config.php");
                 $result = mysqli_query($con, $sql) or die(mysqli_error());
                 $str ='';
                 while($row=mysqli_fetch_array($result)){
                     $str .="<option value='$row[l_id]'>$row[l_id]</option>";
                 }
                 ?>
                 <p>
                     <label for="sign-mcode">Module code:</label>
                     <select class="input" name="l_id">
                         <option value="M1">-- Select the Coordinator Id</option>
                             <?php echo $str ?>
                     </select>
                 </p>
                 <?php
                 $sql = "SELECT d_id FROM diploma;";
                 include_once("config.php");
                 $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                 $str ='';
                 while($row=mysqli_fetch_array($result)){
                     $str .= "<option value ='$row[d_id]'>$row[d_id]</option>";
                 }
                 ?>
                 <p>
                     <label for="sign-mcode">Module code:</label>
                     <select class="input" name="d_id">
                         <option value="M1">-- Select the Diploma Id</option>
                             <?php echo $str ?>
                     </select>
                 </p>
                 <?php
                 $sql = "SELECT dep_id FROM department;";
                 include_once("config.php");
                 $result = mysqli_query($con, $sql) or die(mysqli_error());
                 $str ='';
                 while($row=mysqli_fetch_array($result)){
                     $str .="<option value='$row[dep_id]'>$row[dep_id]</option>";
                 }
                 ?>
                 <p>
                     <label for="sign-dep-id">Department code:</label>
                     <select class="input" name="dep_id">
                         <option value="M1">-- Select the Department Id</option>
                             <?php echo $str ?>
                     </select>
                 </p>
                 <p>
                     <label for="sign-sem">Semester:</label>
                     <input type="text" name="sem" id="sign-sem" placeholder="Enter the Semester" value="<?php echo $row1['semester'] ?>" required>
                 </p>
                 <input id="submit" type="submit" name="submit"value="Update module" onclick="return validatePassword()">
             </form>
         </div>
     </div>
     <script src="js/validation.js"></script>
     <script src="js/navbar.js"></script>
     </body>
 </html>
