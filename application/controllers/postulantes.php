<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Postulantes extends CI_Controller {

    public function index() {
		$this->load->model('postulante_model');
		$this->load->model('perfil_model');
        $this->load->view(
			'postulantes/welcome_message',
			array(
				'postulantes' => $this->postulante_model->get(),
				'perfiles' => $this->perfil_model->get()
			)
		);
    }
    
    public function crear() {
        $this->load->model('postulante_model');
        redirect('postulantes/descriptores/'.$this->postulante_model->set($this->input->post('postulante')));
    }
    
    public function descriptores($id) {
		$this->load->model('postulante_model');
		$this->load->model('pregunta_model');
		//$this->load->model('exclusividad_model');
		//$this->load->model('descriptor_perfil_model');
		$this->load->view(
			'postulantes/descriptores',
			array(
				'postulante' => $this->postulante_model->get($id),
				'preguntas' => $this->pregunta_model->getByPostulante($id),
				//'exclusividades' => $this->exclusividad_model->get(),
				//'descriptores' => $this->descriptor_perfil_model->getByPerfil($id)
			)
		);
    }
	
	public function guardar($id) {
		$this->load->model('descriptor_postulante_model');
		$data = $this->input->post('descriptor_postulante');
		$this->descriptor_postulante_model->setByPostulante($data, $id);
		redirect('postulantes');
	}
	
	public function eliminar($id) {
		$this->load->model('postulante_model');
		$this->postulante_model->remove($id);
		redirect('postulantes');
	}
};