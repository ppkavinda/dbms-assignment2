<?php
session_start();
if(isset($_POST["submit"])){
    $lec = trim($_POST["lec"]);
    $mcode = $_POST["mcode"];
    $r = explode(" ", $lec);

    include_once("config.php");
    $sql1 = "DELETE FROM staff_module WHERE mcode='$mcode';";
    $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));
    if($result1){
        for ($i=0; $i <count($r) ; $i++) {
            $sql2 = "INSERT INTO staff_module(mcode, l_id) VALUES ('$mcode', '$r[$i]');";
            $result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));

            if($result2){
                $_SESSION["msg"]=$sql1;
                $_SESSION["msg2"]=$sql2;
                header("Location: msg.php");
            }else{
                echo mysqli_error($con);
            }
        }
    }
}
if(isset($_POST["prev"])){
    $mcode = $_POST["mcode"];
    include_once("config.php");
    $sql = "SELECT * FROM staff_module WHERE mcode='$mcode';";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $val = '';
        while($row=mysqli_fetch_assoc($result)){
            $val .= $row['l_id'] . " ";
            $val2 = $row['mcode'];
        }
        print_r($row);
    }
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>DBMS- database system</title>
     <link rel="stylesheet" href="../css/form.css?modified=02209">
     <link rel="stylesheet" href="../css/test.css?modified=02r11009">
     <link rel="stylesheet" href="../css/tab.css?modified=0202309">
     <link rel="stylesheet" href="../css/navbar.css?modified=032209">
 </head>
 <body>
     <a href="index.php"><h1>DBMS System</h1></a>
     <h1>Update page</h1>
     <div class="container-main">
         <div id="signup" class="tabcontent">
             <ul class="tab tabani">
                 <li class="tabLi" ><a style="margin-left: 17%;" id="default" class="tablink" >Update modules</a></li>
             </ul>
             <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                 <p style="color: red; margin-left: 5%;">
                     <?php if(isset($msg)) echo $msg; ?>
                 </p>
                 <p>
                     <label for="sign-id">mcode:</label>
                     <input type="text" name="mcode" id="sign-id" placeholder="Module code" <?php if(isset($val)){echo "value='$val2'";} ?> required>
                 </p>
                 <p>
                     <label for="sign-lec">lec:</label>
                     <input type="text" name="lec" id="sign-lec" placeholder="Lectures" <?php if(isset($val)){echo "value='$val'";} ?>>
                 </p>
                 <input id="submit" type="submit" name="submit" value="Update">
                 <input style="margin-bottom: 15px;" type="submit" name="prev" value="Show previous lectures">
             </form>
         </div>
     </div>
         <div id="msg">
             <?php if (isset($sql)) {
                 echo $sql;
             } ?>
         </div>
     </body>
 </html>
