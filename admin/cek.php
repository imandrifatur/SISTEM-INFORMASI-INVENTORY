<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['login'])){
Header("Location:index.php");
}
include 'konek.php'; 
?>