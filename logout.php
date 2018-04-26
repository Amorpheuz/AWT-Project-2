<?php
    session_start();
    $_SESSION["name"]=NULL;
    header("location:register.php");
?>