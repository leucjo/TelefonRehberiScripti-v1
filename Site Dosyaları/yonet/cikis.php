<?php
session_start();
unset($_SESSION['girisok']);
header('location:index.php');
?>