<?php 
require_once ($_SERVER['DOCUMENT_ROOT']."/DanielBrenaAquino/Blogger/Social/DAO/IUsuario.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/DanielBrenaAquino/Blogger/Social/DAO/DataSource.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/DanielBrenaAquino/Blogger/Social/DAO/Usuario.php");
class UsuarioDAO implements IUsuario
{
	public function selectUsuarios(){

		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT * FROM usuario");
		$usuario = null;
		$usuarios = array();

		foreach ($data_table as $clave => $valor) {
			$usuario = new Usuario();
			$usuario->setIdusuario( $data_table[$clave]["idusuario"] );
			$usuario->setNombre( $data_table[$clave]["nombre"] );
			$usuario->setApellidoPaterno( $data_table[$clave]["apellidoPaterno"] );
			$usuario->setApellidoMaterno( $data_table[$clave]["apellidoMaterno"] );
			$usuario->setNacionalidad( $data_table[$clave]["nacionalidad"] );
			$usuario->setSexo( $data_table[$clave]["sexo"] );
			$usuario->setCorreo( $data_table[$clave]["correo"] );
			$usuario->setClave( $data_table[$clave]["clave"] );
			array_push($usuarios, $usuario);
		}
		return $usuarios;
	}

	public function selectUsuarioById($id){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE idusuario = :idusuario",array(
			':idusuario'=>$id));
		$usuario = null;

		if(count($data_table) == 1){

			foreach ($data_table as $clave => $valor) {
				$usuario = new Usuario();
				$usuario->setIdusuario( $data_table[$clave]["idusuario"] );
				$usuario->setNombre( $data_table[$clave]["nombre"] );
				$usuario->setApellidoPaterno( $data_table[$clave]["apellidoPaterno"] );
				$usuario->setApellidoMaterno( $data_table[$clave]["apellidoMaterno"] );
				$usuario->setNacionalidad( $data_table[$clave]["nacionalidad"] );
				$usuario->setSexo( $data_table[$clave]["sexo"] );
				$usuario->setCorreo( $data_table[$clave]["correo"] );
				$usuario->setClave( $data_table[$clave]["clave"] );
			}
			return $usuario;
		}else{
			return null;
		}
	}
	
	public function searchUsuario($correo, $clave){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE correo = :correo AND clave = :clave",
			array(':correo'=>$correo,':clave'=>$clave));
		$usuario = null;

		if(count($data_table) == 1){

			foreach ($data_table as $clave => $valor) {
				$usuario = new Usuario();
				$usuario->setIdusuario( $data_table[$clave]["idusuario"] );
				$usuario->setNombre( $data_table[$clave]["nombre"] );
				$usuario->setApellidoPaterno( $data_table[$clave]["apellidoPaterno"] );
				$usuario->setApellidoMaterno( $data_table[$clave]["apellidoMaterno"] );
				$usuario->setNacionalidad( $data_table[$clave]["nacionalidad"] );
				$usuario->setSexo( $data_table[$clave]["sexo"] );
				$usuario->setCorreo( $data_table[$clave]["correo"] );
				$usuario->setClave( $data_table[$clave]["clave"] );
			}
			return $usuario;
		}else{
			return null;
		}
	}

	public function insertUsuario(Usuario $usuario){
		$data_source = new DataSource();

		$sql = "INSERT INTO usuario VALUES (:idusuario,:nombre,:apellidoPaterno,:apellidoMaterno,:nacionalidad,
			:sexo,:correo,:clave)";

		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':idusuario'=>$usuario->getIdusuario(),
			':nombre'=>$usuario->getNombre(),
			':apellidoPaterno'=>$usuario->getApellidoPaterno(),
			':apellidoMaterno'=> $usuario->getApellidoMaterno(),
			':nacionalidad'=>$usuario->getNacionalidad(),
			':sexo'=>$usuario->getSexo(),
			':correo'=>$usuario->getCorreo(),
			':clave'=>$usuario->getClave()
			)
		);
		return $resultado;
		
	}

	public function updateUsuario(Usuario $usuario){
		$data_source = new DataSource();
		$sql = "UPDATE usuario SET nombre = :nombre,
				apellidoPaterno = :apellidoPaterno,
				apellidoMaterno = :apellidoMaterno,
				nacionalidad = :nacionalidad,
				sexo = :sexo,
				correo = :correo
				WHERE idusuario = :idusuario
				";
		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':nombre'=>$usuario->getNombre(),
			':apellidoPaterno'=>$usuario->getApellidoPaterno(),
			':apellidoMaterno'=> $usuario->getApellidoMaterno(),
			':nacionalidad'=>$usuario->getNacionalidad(),
			':sexo'=>$usuario->getSexo(),
			':correo'=>$usuario->getCorreo(),
			':idusuario'=>$usuario->getIdusuario()
			)
		);
		return $resultado;
	}

	public function deleteUsuario($id){
		$data_source = new DataSource();
		$resultado = $data_source->ejecutarActualizacion("DELETE FROM usuario WHERE idusuario = :idusuario",
			array(':idusuario'=>$id));
		return $resultado;
	}

}

 ?>