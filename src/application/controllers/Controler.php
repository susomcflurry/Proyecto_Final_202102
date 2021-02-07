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
     * Este es el método para ir a la vista para crear un nuevo recurso
     */
    public function newrecur()
    {
        $result= $this->Model->tesauros();
        $data = array('consulta'=>$result);
        $this->load->view('new', $data);
    }

    /**
     * Método para continuar la busqueda de tesauro
     */
    public function newcont($id){
        $result= $this->Model->conttesauros($id);
        if ($result->num_rows() > 0){
            $data = array('consulta'=>$result);
            $this->load->view('new', $data);
        }else{
            $this->load->view('create', array('id' => $id));
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
