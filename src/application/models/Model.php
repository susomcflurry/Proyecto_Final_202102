<?php
//Nombre de autor:Jesús Canga Galván
//Curso:2 DAW
//Escuela: Escuela Virgen de Guadalupe
//Proyecto fin de ciclo: Proyecto de Sistema de Gestión del Conocimiento
//Año:2021

/**
 * Class Model, es el modelo que gestiona todas las operaciones de BD
 */
class Model extends CI_Model
{
	var $bd = null;

	public function __construct()
	{

		parent::__construct();

		$this->bd = $this->load->database('default', true);
	}


	/**
	 * Metodo verifica el usuario introducido en el login
	 * @param $usuario Son los datos del login, para verificar el usuario
	 */
	public function autenticar($usuario)
	{

		$this->bd->select('id,correo');
		$this->bd->from('Usuario');
		$this->bd->where("correo", $usuario);

		$resultado = $this->bd->get();

		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		} else {
			return false;
		}

	}

	/**
	 * Metodo para obtener los datos del usuario
	 *
	 */
	public function datos($usuario)
	{

		$this->bd->select('Id_Usuario,Correo,Pw,Nombre,Tipo');
		$this->bd->from('Usuario');
		$this->bd->where("Id_Usuario", $usuario);

		$resultado = $this->bd->get();

		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		} else {
			return false;
		}

	}

	/**
	 * Metodo para obtener los datos de los tesauros principales
	 *
	 */
	public function tesauros()
	{
		$query = "SELECT * FROM `Tesauro` WHERE id LIKE '_'";
		return $resultados = $this->bd->query($query);


	}

	/**
	 * Método que continua con la busqueda de tesauros
	 */
	public function conttesauros($id){
		$query = "SELECT * FROM `Tesauro` WHERE id LIKE '".$id."._'";
		return $resultados = $this->bd->query($query);
	}

	/**
	 * Metodo que registra un nuevo usuario
	 *
	 */
	public function alta($datos)
	{
		$this->bd->insert('Usuario', $datos);
		$error=$this->bd->error();
		return $error;
	}
}

?>
