<?php
session_start();
if(isset($_POST["submit"])){
    $s_id = $_POST["s_id"];
    $date = $_POST["date"];
    $mcode = $_POST["mcode"];
    $result = $_POST["result"];

    include_once("config.php");
    $sql2 = "INSERT INTO student_exam(s_id, date, mcode, grade) VALUES ('$s_id', '$date', '$mcode', '$result');";
    $result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));

    if($result2){
        $_SESSION["msg"]=$sql2;
        header("Location: msg.php");
    }else{
        mysqli_error($con);
        // echo mysqli_error($con);
    }
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>DBMS- database system</title>
     <link rel="stylesheet" href="../css/form.css?modified=023209">
     <link rel="stylesheet" href="../css/test.css?modified=0211009">
     <link rel="stylesheet" href="../css/tab.css?modified=0202309">
     <link rel="stylesheet" href="../css/navbar.css?modified=032209">
 </head>
 <body>
     <a href="index.php"><h1>DBMS System</h1></a>
     <h1>Insert Result page</h1>
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
                     <label for="sign-student-id">Student Id:</label>
                     <input type="text" name="s_id" id="sign-student-id" placeholder="Enter Student ID" required>
                 </p>
                 <p>
                     <label for="sign-date">Date:</label>
                     <input type="date" name="date" id="sign-date" placeholder="Enter Date" required>
                 </p>
                 <?php
                 $sql = "SELECT mcode FROM module;";
                 include_once("config.php");
                 $result = mysqli_query($con, $sql) or die(mysqli_error());
                 $str ='';
                 while($row=mysqli_fetch_array($result)){
                     $str .="<option value='$row[mcode]'>$row[mcode]</option>";
                 }
                 ?>
                 <p>
                     <label for="sign-mcode">Module code:</label>
                     <select class="input" name="mcode">
                         <option value="M1">-- Select the Module code</>
                             <?php echo $str ?>
                     </select>
                 </p>
                 <p>
                     <label for="sign-result">Result:</label>
                     <input type="text" name="result" id="sign-result" placeholder="Enter the grade" required>
                 </p>
                 <input id="submit" type="submit" name="submit"value="Insert">
             </form>
         </div>
     </div>
     </body>
 </html>
