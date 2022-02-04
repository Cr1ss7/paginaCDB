<?php
class User{
	private $codigo;
	private $nombre;
	private $apellido;
	private $pass;

	public function veriUser($codigo,$pass){
		if(preg_match('/^[0-9]*$/', $codigo)){
			$this->codigo = $codigo;
			$this->pass = $pass;
			return true;
		}else{
			throw new Exception("Error con el formato del codigo");
		}
	}

	public function searchUser(){
		$dbh = new Conexion();
		$conexion = $dbh->get_Conexion();
		$sql = "Select * from usuario where codigo=:codigo and pass=:pass";
		$stmt = $conexion->prepare($sql);
		$stmt->bindParam(":codigo",$this->codigo);
		$stmt->bindParam(":pass",$this->pass);
		if(!$stmt)
			throw new Exception("Error en el statement");
		else{
			$stmt->execute();
			if(!$stmt->rowCount()){
				throw new Exception("Error. usuario no existente o se equivoco con las credenciales");
			}else{
				return true;
			}
		}
	}

	public function setUser($codigo){
		$dbh = new Conexion();
		$conexion = $dbh->get_Conexion();
		$sql = "Select * from usuario where codigo=:codigo";
		$stmt = $conexion->prepare($sql);
		$stmt->bindParam(":codigo",$codigo);
		if(!$stmt)
			throw new Exception("Error con las ejecucion");
		else{
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->codigo = $data['codigo'];
			$this->nombre = $data['nombre'];
			$this->apellido = $data['apellido'];
		}
	}

	//Manipulacion de sesiones

	public function setSession(){
		session_start();
		$_SESSION['user'] = $this->codigo;
	}

	public function getSession(){
		return $_SESSION['user'];
	}

	public function closeSession(){
		session_unset();
		session_destroy();
	}

	//funciones get

	public function getCodigo(){
		return $this->codigo;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}
}
?>
