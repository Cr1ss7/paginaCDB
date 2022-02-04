<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.user.php');

$user = new User();

$codigo = $_POST['carnet'];
$pass = $_POST['pass'];

if(isset($_SESSION['user'])){

}else{
	try{
		$user->veriUser($codigo,$pass);
		$user->searchUser();
		$user->setUser($codigo);
		echo $user->getCodigo();
	}catch(Exception $e){
		$errorLog = $e->getMessage();
		include_once'../vista/vis.login.php';
	}
}

?>
