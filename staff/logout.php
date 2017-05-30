<?php
session_start();
if(isset($_SESSION["id"]) || isset($_SESSION["level"])){
    unset($_SESSION["id"]);
    unset($_SESSION["level"]);

    header("Location: index.php");
}
