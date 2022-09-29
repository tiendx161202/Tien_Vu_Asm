<?php
    include ("../database/connect.php");
    unset($_SESSION['users']);
    header("location:../index.php");
?>
