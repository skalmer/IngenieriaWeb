<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Usuario_model');
    }

    function index()
    {
        $dat['_view'] = 'dashboard1';
        $this->load->view('layouts/main', $dat);
    }
    function login()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $dat['_view'] = 'dashboard';
            $this->load->view('layouts/main', $dat);
        } else {
            $contraseña =  $this->input->post('Contraseña');
            $usuario =  $this->input->post('Usuario');
            $data['usuario'] = $this->Usuario_model->logear($usuario, $contraseña);

            if ($data['usuario']) {
                $this->session->set_userdata('logged_in', 'Jonathan');
                $dat['_view'] = 'dashboard';
                $this->load->view('layouts/main', $dat);
            } else {
                echo '<script language="javascript">alert("Usuario o password incorrecta, por favor vuelva a intentar");</script>';
                $dat['error'] = "Usuario o password incorrecta, por favor vuelva a intentar";
                $dat['_view'] = 'dashboard1';
                $this->load->view('layouts/main', $dat);
            }
        }
    }
    function logout()
    {
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $dat['message_display'] = 'La sesión finalizó correctamente.';
        $dat['_view'] = 'dashboard1';
        $this->load->view('layouts/main', $dat);
    }
}
