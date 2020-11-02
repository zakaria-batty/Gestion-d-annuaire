<?php 
session_start();
unset($_SESSION['a']);
unset($_SESSION['passwword']);
session_destroy();
header('Location:index.php');
