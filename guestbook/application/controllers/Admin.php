
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('guestbook_model');
	}

	public function index() {
		$date_filter = $this->input->get('date_filter');
		
		$data['guests'] = $this->guestbook_model->get_all_guests($date_filter);
		$data['date_filter'] = $date_filter;
		
		$this->load->view('admin_list', $data);
	}

	public function export_csv() {
		$guests = $this->guestbook_model->get_all_guests();
		
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=guestbook_'.date('Y-m-d').'.csv');
		
		$output = fopen('php://output', 'w');
		fputcsv($output, array('ID', 'Nama', 'Email', 'Pesan', 'Tanggal'));
		
		foreach ($guests as $guest) {
			fputcsv($output, array(
				$guest->id,
				$guest->name,
				$guest->email,
				$guest->message,
				$guest->created_at
			));
		}
		fclose($output);
		exit;
	}
}