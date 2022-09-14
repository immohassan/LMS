<?php
session_start();
if(!isset($_SESSION['loggin']) || $_SESSION['loggin']!=true)
{
    session_unset();
    session_destroy();
    exit;
}
header("location: index.php");
?>