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
        //$this->load->model('Model');
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
     * Método que permite la creación de nuevo usuario
     */
    public function create()
    {
        $this->load->view('login');
    }
}
