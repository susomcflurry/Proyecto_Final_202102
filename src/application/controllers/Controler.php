<?php
//Nombre de autor:Jesús Canga Galván
//Curso:2 DAW
//Escuela: Escuela Virgen de Guadalupe
//Proyecto fin de ciclo: Proyecto de Sistema de Gestión del Conocimiento
//Año:2021
defined('BASEPATH') OR exit('No direct script access allowed');

class Controler extends CI_Controller {


    /**
     * Este es un resumen de la clase.
     *
     * Esta es la clase que realizará todas las operaciones.
     *
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Model');
    }

    /**
	 * Por ahora metodo de inicio de la app
     *
     * Solo dirige a lo qiue por ahora será el login
	 */
	public function index()
	{
		$this->load->view('login');
	}

    /**
     * Método que permite mostar la vista del registro
     */
    public function registro()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('register');
    }

    /**
     * Método que permite crear un nuevo usuario o indicar que es incorrecto
     */
    public function alta()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $correo = $this->input->post('usu');
        $pw1 = $this->input->post('pw1');
        $pwhash = password_hash($pw1, PASSWORD_BCRYPT);

        $datos = array();
        $datos['Correo'] = $correo;
        $datos['Pw'] = $pwhash;
        $datos['tipo'] = 0;
        $error = $this->Model->alta($datos);

        if ($error['code']!=0) {
            echo 'Error al introducir el usuario';
            //$this->load->view('welcome_message');
        } else {
            return $this->index();
        }
    }
}
