<?php
session_start();
if(isset($_POST["submit"])){
    $mcode = $_POST["mcode"];
    $date = $_POST["date"];

    include_once("config.php");
    $sql1 = "INSERT INTO exmas(date, mcode) VALUES ('$date', '$mcode');";
    $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

    if($result1){
        $_SESSION["msg"]=$sql1;
        header("Location: msg.php");
    }else{
        mysqli_error($con);
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
     <h1>Insert exams page</h1>
     <div class="container-main">
         <div id="signup" class="tabcontent">
             <ul class="tab tabani">
                 <li class="tabLi" ><a style="margin-left: 17%;" id="default" class="tablink" >insert exams</a></li>
             </ul>
             <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                 <p style="color: red; margin-left: 5%;">
                     <?php if(isset($msg)) echo $msg; ?>
                 </p>
                 <p>
                     <label for="sign-id">Module code:</label>
                     <input type="text" name="mcode" id="sign-id" placeholder="Enter Module code" required>
                 </p>
                 <p>
                     <label for="sign-fname">Date:</label>
                     <input type="date" name="date" id="sign-date" placeholder="Enter the Date" required>
                 </p>
                 <input id="submit" type="submit" name="submit"value="Insert">
             </form>
         </div>
     </div>
     </body>
 </html>
