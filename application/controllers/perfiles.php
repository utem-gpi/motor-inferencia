<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfiles extends CI_Controller {

    public function index() {
		$this->load->model('perfil_model');
        $this->load->view(
			'perfiles/welcome_message',
			array(
				'perfiles' => $this->perfil_model->get()
			)
		);
    }
    
    public function crear() {
        $this->load->model('perfil_model');
        redirect('perfiles/descriptores/'.$this->perfil_model->set($this->input->post('perfil')));
    }
    
    public function descriptores($id) {
		$this->load->model('perfil_model');
		$this->load->model('parametro_model');
		$this->load->model('exclusividad_model');
		$this->load->model('descriptor_perfil_model');
		$this->load->view(
			'perfiles/descriptores',
			array(
				'perfil' => $this->perfil_model->get($id),
				'parametros' => $this->parametro_model->getByPerfil($id),
				'exclusividades' => $this->exclusividad_model->get(),
				'descriptores' => $this->descriptor_perfil_model->getByPerfil($id)
			)
		);
    }
	
	public function guardar($id) {
		$this->load->model('descriptor_perfil_model');
		$data = $this->input->post('descriptor_perfil');
		$this->descriptor_perfil_model->setByPerfil($data, $id);
		redirect('perfiles');
	}
	
	public function eliminar($id) {
		$this->load->model('perfil_model');
		$this->perfil_model->remove($id);
		redirect('perfiles');
	}
};