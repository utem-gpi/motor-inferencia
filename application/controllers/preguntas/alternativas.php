<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alternativas extends CI_Controller {

    public function index($id) {
		$this->load->model('pregunta_model');
		$this->load->model('alternativa_model');
        $this->load->view(
			'preguntas/alternativas/welcome_message',
			array(
				'pregunta' => $this->pregunta_model->get($id),
				'alternativas' => $this->alternativa_model->getByPregunta($id)
			)
		);
    }
    
    public function crear($id_pregunta) {
        $this->load->model('alternativa_model');
        redirect('preguntas/alternativas/descriptores/'.$this->alternativa_model->setByPregunta($this->input->post('alternativa'), $id_pregunta));
    }
	
	public function descriptores($id) {
		$this->load->model('pregunta_model');
		$this->load->model('parametro_model');
		$this->load->model('alternativa_model');
		$this->load->model('descriptor_alternativa_model');
		
		$alternativa = $this->alternativa_model->get($id);
		$this->load->view(
			'preguntas/alternativas/descriptores',
			array(
				'pregunta' => $this->pregunta_model->get($alternativa->id_pregunta),
				'alternativa' => $alternativa,
				'descriptores' => $this->descriptor_alternativa_model->getByAlternativa($id),
				'parametros' => $this->parametro_model->getByAlternativa($id)
			)
		);
    }
	
	public function guardar($id) {
		$this->load->model('pregunta_model');
		$this->load->model('descriptor_alternativa_model');
		$data = $this->input->post('descriptor_alternativa');
		$this->descriptor_alternativa_model->setByAlternativa($data, $id);
		redirect('preguntas/alternativas/index/'.$this->pregunta_model->getByAlternativa($id)->id);
	}
	
	public function eliminar($id) {
		$this->load->model('pregunta_model');
		$this->load->model('alternativa_model');
		$id_alternativa = $this->pregunta_model->getByAlternativa($id)->id;
		$this->alternativa_model->remove($id);
		redirect('preguntas/alternativas/index/'.$id_alternativa);
	}
};