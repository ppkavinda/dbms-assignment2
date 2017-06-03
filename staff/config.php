<?php
define('DB_HOST', "localhost");
define('DB_NAME', "assignment_test3");
define('DB_USERNAME', "admin");
define('DB_PASSWORD', "admin");

$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error($con));
