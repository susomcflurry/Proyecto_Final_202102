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

	/**
	 * Método que nos devuelve el id del usuario de la sesión
	 */
	public function getusu(){
		$this->bd->select('id');
		$this->bd->from('Usuario');
		$this->bd->where("correo", $_SESSION['email']);

		$resultado = $this->bd->get();
		return $resultado->result_array();
	}

	/**
	 *Método que crea el recurso en la bbdd
	 * @param $datos Guarda los datos que se an a subir a la bbdd
	 */
	public function subirrecur($datos){
		$this->bd->insert('Recurso', $datos);
		$error=$this->bd->error();
		return $error;
	}

	/**
	 * Método para obtener los recursos del usuario
	 * @param $id Id del usuario para buscar sus recursos
	 */
	public function getrecur($id){
		$this->bd->select('*');
		$this->bd->from('Recurso');
		$this->bd->where('id_usuario', $id);
		$resultado = $this->bd->get();
		return $resultado;
	}
}

?>
