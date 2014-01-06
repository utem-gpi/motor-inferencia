<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
		$this->load->model('pregunta_model');
        $this->load->view(
			'preguntas/welcome_message',
			array(
				'preguntas' => $this->pregunta_model->get()
			)
		);
    }
    
    public function crear() {
        $this->load->model('pregunta_model');
        redirect('preguntas/alternativas/index/'.$this->pregunta_model->set($this->input->post('pregunta')));
    }
	
	public function eliminar($id) {
		$this->load->model('pregunta_model');
		$this->pregunta_model->remove($id);
		redirect('preguntas');
	}
};