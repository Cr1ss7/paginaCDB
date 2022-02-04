<?php
class Conexion{
	public function get_Conexion(){
		$user = "root";
		$pass = "";
		$host = "localhost";
		$db = "cdb";
		try{
			$dsn = "mysql:host=$host;dbname=$db;";
			$dbh = new PDO($dsn, $user, $pass);
			return $dbh;
		}catch(PDOException $e){
			echo "Error al conectar con la base de datos" . $e->getMessage();
		}
	}
}
?>
