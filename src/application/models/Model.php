<?php
//Nombre de autor:Jesús Canga Galván
//Curso:2 DAW
//Escuela: Escuela Virgen de Guadalupe
//Proyecto fin de ciclo: Proyecto de Sistema de Gestión del Conocimiento
//Año:2021

class Model extends CI_Model
{
	var $bd = null;

	public function __construct()
	{

		parent::__construct();

		$this->bd = $this->load->database('default', true);
	}


	/**
	 * Metodo que comprueba usuario y contraseña para iniciar sesión
	 *
	 */
	public function autenticar($usuario)
	{

		$this->bd->select('id_usuario,correo,password,tipo');
		$this->bd->from('usuario');
		$this->bd->where("correo", $usuario);

		$resultado = $this->bd->get();

		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		} else {
			return false;
		}

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
