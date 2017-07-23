<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions_model extends CI_Model {

	/**
	 * It creates a new question about entrepreneurship.
	 * 
	 * @param string $email 	user's email.
	 * @param string $question 	user's question.
	 * @return array 			an standard response with the status of the
	 *							request and a message in case of error.
	 */
	public function add($email = "", $question = "") {
		$data = array(
			'email' => $email,
			'question' => $question
		);

		if ($email != "" && $question != "") {
			$this->db->insert('questions', $data);

			return array('status' => 'OK');
		} else {
			return array(
				'status' => 'BAD',
				'msg' => 'Ni la pregunta, ni el correo pueden tener valores vacios. Por favor ingresa una pregunta y correo válido.'
			);
		}
	}

	/**
	 * It retrieves a question according to their identifier.
	 * 
	 * @param string $id_question 	question identifier.
	 * @return array 			an standard response with the status of the
	 *							request and a message in case of error.
	 */
	public function get_question($id_question) {
		$this->db->select('question, answer, name AS entrepreneur, company, thumbnail');
		$this->db->from('answers AS a');
		$this->db->join('questions AS q', 'q.id = a.idQuestion');
		$this->db->join('entrepreneur AS e', 'e.id = a.idEntrepreneur');
		$this->db->where('q.id', $id_question);
		$query = $this->db->get();

		return array(
			'status' => 'OK',
			'question' => $query->row();
		);
	}

	/**
	 * It retrieves a list of questions according to their limit and offset.
	 * 
	 * @param string $offset 	offset in the list of questions.
	 * @param string $limit 	limit of questions retrieved by request.
	 * @return array 			an standard response with the status of the
	 *							request and a message in case of error.
	 */
	public function get_questions($offset = 0, $limit = 10) {
		$this->db->select('question, email');
		$this->db->limit($limit, $offset);
		$query = $this->db->get('questions');

		return array(
			'status' => 'OK',
			'question' => $query->result();
		);
	}

}

/* End of file Questions_model.php */
/* Location: ./application/models/Questions_model.php */