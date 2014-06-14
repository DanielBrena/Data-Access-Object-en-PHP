<?php 
class Usuario
{
	private $idusuario;
	private $nombre;
	private $apellidoPaterno;
	private $apellidoMaterno;
	private $nacionalidad;
	private $sexo;
	private $correo;
	private $clave;
	
	public function setIdusuario($idusuario){
		$this->idusuario = $idusuario;
	}

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setApellidoPaterno($apellidoPaterno){
		$this->apellidoPaterno = $apellidoPaterno;
	}

	public function getApellidoPaterno(){
		return $this->apellidoPaterno;
	}

	public function setApellidoMaterno($apellidoMaterno){
		$this->apellidoMaterno = $apellidoMaterno;
	}

	public function getApellidoMaterno(){
		return $this->apellidoMaterno;
	}

	public function setNacionalidad($nacionalidad){
		$this->nacionalidad = $nacionalidad;
	}

	public function getNacionalidad(){
		return $this->nacionalidad;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setCorreo($correo){
		$this->correo = $correo;
	}

	public function getCorreo(){
		return $this->correo;
	}

	public function setClave($clave){
		$this->clave = $clave;
	}

	public function getClave(){
		return $this->clave;
	}



}

 ?>