<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//Nombre de autor:Jesús Canga Galván
//Curso:2 DAW
//Escuela: Escuela Virgen de Guadalupe
//Proyecto fin de ciclo: Proyecto de Sistema de Gestión del Conocimiento
//Año:2021

/**
 * Class Auth
 */
class Auth extends CI_Controller
{

    /**
     * Constructor Login Auth
     *
     * Cuando el usuario entra en esta clase el programa verifica si ya ha iniciado sesion y
     * si no te redirige a la vista para iniciar sesion
     *
     *
     */
    function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('google'); /*Libreria de Google necesaria*/
        $this->load->model('Model');
        $this->comprobacion();
    }

    /**
     * Eliminacion proceso instalacion
     *
     * Al ser el controlador por defecto cuando se acaba el proceso de instalacion, aqui se eliminan los archivos de instalacion si existieran
     */
    public function index()
    {
        if (file_exists(APPPATH . 'controllers\Instalacion.php'))
            unlink(APPPATH . 'controllers\Instalacion.php');
        if (file_exists(APPPATH . 'views\instalacion.php')) {
            unlink(APPPATH . 'views\instalacion.php');

        }
    }


    /**
     * Inicializa los datos del usuario de Google
     *
     * En casoi de no existir en nuestra BD el usuario, lo crea
     *
     * Despues de iniciar sesion te redirige a este método, donde se crean los datos, este metodo se tiene que especificar tanto
     * en /config/google_config.php como en https://console.developers.google.com/
     */
    public function oauth2callback()
    {
        /*datos sesion*/
        $google_data = $this->google->validate();
        $session_data = array(
            'name' => $google_data['name'],
            'email' => $google_data['email'],
            'source' => 'google',
            'profile_pic' => $google_data['profile_pic'],
            'link' => $google_data['link'],
            'sess_logged_in' => 1
        );
        $this->session->set_userdata($session_data);
        $data['google_login_url'] = $this->google->get_login_url();
        $verify = $this->Model->autenticar($google_data['email']);
        $array = json_decode(json_encode($verify), true);
        if($google_data['email']==$array['correo']){
            redirect(base_url());
        }else{
            $datos = array();
            $datos['correo'] = $google_data['email'];
            $datos['nombre'] = $google_data['name'];
            $this->Model->alta($datos);
            redirect(base_url());
        }

    }


    /**
     * Logout del usuario
     *
     * Se invoca este método cuando se va a cerrar sesion, elimina todos los datos de sesion del usuario
     */
    public function logout()
    {
        $this->google->revoke_token();
        $this->session->unset_userdata('session_data');
        $this->session->sess_destroy();
        $data['google_login_url'] = $this->google->get_login_url();
        redirect(base_url());
    }

    public function comprobacion()
    {
        $data['google_login_url'] = $this->google->get_login_url();
        if ($this->session->userdata('sess_logged_in') == 1) {
            $result= $this->Model->tesauros();
            $data = array('consulta'=>$result);
            $this->load->view('home', $data);
        } else {
            $this->load->view('login', $data);
        }
    }

}
