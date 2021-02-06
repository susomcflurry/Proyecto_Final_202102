<?php
//Nombre de autor:Jesús Canga Galván
//Curso:2 DAW
//Escuela: Escuela Virgen de Guadalupe
//Proyecto fin de ciclo: Proyecto de Sistema de Gestión del Conocimiento
//Año:2021
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Controler, será el controlador que realize todas las operaciones de la aplicación
 */
class Controler extends CI_Controller {


    /**
     * Esta es la clase que realizará todas las operaciones.
     * Y aqui inicializamos las librerias necesarias y el modelo
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('google'); /*Libreria de Google necesaria*/
        $this->load->library('form_validation');
        $this->load->model('Model');
        $this->comprobacion();
    }

    /**
	 * Por ahora metodo de inicio de la app
     *
     * Solo dirige a lo que por ahora será el login
	 */
	public function index()
	{
        $this->load->helper('url');
        if ($this->session->userdata('loged')) {
            $this->load->view('home');
        } else {
            $this->load->view('Login');
        }
	}



    /**
     * Metodo encargado de realizar el login
     * Autenticando a los usuarios
     *
     */

    public function logearse()
    {
        /**
         * Introducimos los datos del formulario a variables
        */
        $usuario = $this->input->post("usu");
        $password = $this->input->post("pw");

        /**
         * Comprobacion de usuario existente
         */

        $verify = $this->Model->autenticar($usuario);

        $array = json_decode(json_encode($verify), true);

        if(password_verify($password,$array['Pw']))
        {
            /**
             * Creamos el array con los datos
             * de la sesión
             */
            $sesion = array(
                'id_usu' => $array['Id_Usuario'],
                'correo' => $array['Correo'],
                'nombre' => $array['Nombre'],
                'type_usu' => $array['Tipo'],
                'loged' => TRUE
            );

            $this->session->set_userdata($sesion);
            return $this->index();

        }
        else
        {
            $this->load->view('welcome_message');
        }


    }

    /**
     * Método que muestra la vista con la información del usuario
     */
    public function profile()
    {
        $this->load->view('profile');
    }



    /**
     * Método que permite crear 2 usuarios para pruebas
     * un admin y un tipo profesor
     */
    public function alta()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $correo = "admin@admin.com";
        $nombre = "admin";
        $pw1 = "Prueba";
        $pwhash = password_hash($pw1, PASSWORD_BCRYPT);

        $datos = array();
        $datos['Correo'] = $correo;
        $datos['Pw'] = $pwhash;
        $datos['Nombre'] = $nombre;
        $datos['tipo'] = 0;
        $error = $this->Model->alta($datos);

        $correo = "prueba@gmail.com";
        $nombre = "prueba";
        $pw1 = "Prueba";
        $pwhash = password_hash($pw1, PASSWORD_BCRYPT);

        $datos = array();
        $datos['Correo'] = $correo;
        $datos['Pw'] = $pwhash;
        $datos['Nombre'] = $nombre;
        $datos['tipo'] = 0;
        $error = $this->Model->alta($datos);

        if ($error['code']!=0) {
            echo 'Error al introducir el usuario';
        } else {
            return $this->index();
        }
    }

    /**
     * Se comprueba el login del usuario
     *
     * Si el usuario no está logueado se redirige al controlador Auth, si está logueado el usuario se mantiene en la página
     */
    public function comprobacion()
    { //Codeigniter no deja extender de varias clases y al crear objeto no salen los metodos de la otra clase, asi que repetiré este metodo comprobacion en todos los sitios ¯\_(ツ)_/¯
        $data['google_login_url'] = $this->google->get_login_url();
        if (file_exists(APPPATH . 'controllers\Instalacion.php')) {
            redirect(Instalacion::class);
        } else {
            if ($this->session->userdata('sess_logged_in') == 0) {
                redirect(Auth::class);
            }
        }
    }
}
