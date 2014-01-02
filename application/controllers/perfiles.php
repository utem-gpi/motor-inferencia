<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $this->load->view('perfiles/welcome_message');
    }
    
    public function crear() {
        $this->load->model('perfil_model');
        redirect('perfiles/descriptores/'.$this->perfil_model->set($this->input->post('perfil')));
    }
    
    public function descriptores(id) {
        $this->load->model('rango_model');
        $this->load->model('exclusividad_model');
        $this->load->model('descriptor_perfil_model');
    }
};