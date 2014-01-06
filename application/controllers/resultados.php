<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resultados extends CI_Controller {

    public function index() {
		$this->load->model('postulante_model');
		$this->load->model('perfil_model');
        $this->load->view(
			'resultados/welcome_message',
			array(
				'postulantes' => $this->postulante_model->get(),
				'perfiles' => $this->perfil_model->get()
			)
		);
    }
    
    public function descriptores($id) {
		$this->load->model('resultado_model');

		$this->load->model('postulante_model');
		$this->load->model('perfil_model');
		//$this->load->model('pregunta_model');
		//$this->load->model('exclusividad_model');
		//$this->load->model('descriptor_perfil_model');
		$postulante = $this->postulante_model->get($id);
		$this->load->view(
			'resultados/descriptores',
			array(
				'postulante' => $postulante,
				'perfil' => $this->perfil_model->get($postulante->id_perfil),
				'resultados' => $this->resultado_model->getDetailByPostulante($id),
				'resumen' => $this->resultado_model->getSummaryByPostulante($id),
				//'preguntas' => $this->pregunta_model->getByPostulante($id),
				//'exclusividades' => $this->exclusividad_model->get(),
				//'descriptores' => $this->descriptor_perfil_model->getByPerfil($id)
			)
		);
    }
	
};