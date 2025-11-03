
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guestbook extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('guestbook_model');
		$this->load->library('form_validation');
	}

	public function index() {
		$this->form_validation->set_rules('name', 'Nama', 'required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('message', 'Pesan', 'required|min_length[10]');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'message' => $this->input->post('message')
			);

			if ($this->guestbook_model->insert_guest($data)) {
				$this->session->set_flashdata('success', 'Pesan berhasil dikirim!');
				redirect('guestbook');
			}
		}

		$this->load->view('guest_form');
	}
}