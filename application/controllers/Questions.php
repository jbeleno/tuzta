<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Questions extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('questions_model');
    }

	public function add()
	{
		$question = @$this->input->post('question', TRUE);
		$email = @$this->input->post('email', TRUE);

		$response = $this->questions_model->add($email, $question);
		$this->output
	         ->set_content_type('application/json')
	         ->set_output(json_encode($response));
	}

	public function get()
	{
		$offset = @$this->input->get('offset', TRUE);

		$response = $this->questions_model->get_questions($offset);
		$this->output
	         ->set_content_type('application/json')
	         ->set_output(json_encode($response));
	}

	public function get_one()
	{
		$id_question = @$this->input->get('id_question', TRUE);

		$response = $this->questions_model->get_question($id_question);
		$this->output
	         ->set_content_type('application/json')
	         ->set_output(json_encode($response));
	}

}

/* End of file Questions.php */
/* Location: ./application/controllers/Questions.php */