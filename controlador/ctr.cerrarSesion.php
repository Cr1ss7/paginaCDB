<?php
session_start();
require_once('../modelo/class.user.php');

$user = new User();
$user->closeSession();

header("location: ../index.php");
?>
