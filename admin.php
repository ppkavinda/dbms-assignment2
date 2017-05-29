<?php
session_start();
if (!isset($_SESSION["id"]) || !isset($_SESSION["level"])) {
    header("Location: index.php");
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>DBMS- database system</title>
     <link rel="stylesheet" href="css/form.css?modified=02209">
     <link rel="stylesheet" href="css/test.css?modified=02009">
     <link rel="stylesheet" href="css/tab.css?modified=022309">
     <link rel="stylesheet" href="css/navbar.css?modified=022309">
 </head>
 <body>
     <ul class="navbar">
         <li class="navli activenav" onclick="active(this);"><a href="#">home</a></li>
         <li class="navli" onclick="active(this);"><a href="#">tmp1</a></li>
         <li class="navli" onclick="active(this);"><a href="#">tmp2</a></li>
         <li class="navli" onclick="active(this);"><a href="#">tmp3</a></li>
         <li class="space"><a href="#">space</a></li>
         <li class="navli" id="logout"><a href="logout.php">logout</a></li>
     </ul>
     <h1>DBMS System</h1>
     <h1>Admin page</h1>
     <div class="container-main admin">
         <a class="admin-link" href="insert_module.php">Registere Module</a>
         <a class="admin-link" href="register_student.php">Registere Students</a>
         <a class="admin-link" href="register_lecture.php">Registere Lecture</a>
         <a class="admin-link" href="while.php">Update module's lecturers</a>
         <a class="admin-link" href="search.php">Search Students</a>
         <a class="admin-link" href="search_staff.php">Search Staff</a>
         <a class="admin-link" href="insert_results.php">Enter results</a>
         <a class="admin-link" href="insert_exams.php">Enter exam dates</a>
         <a class="admin-link" href="exams.php">Show exams</a>
         <a class="admin-link" href="modules.php">Show modules</a>
     </div>
     <script src="js/navbar.js"></script>
     </body>
 </html>
