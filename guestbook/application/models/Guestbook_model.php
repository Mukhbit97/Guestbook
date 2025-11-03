
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guestbook_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function insert_guest($data) {
		return $this->db->insert('guests', $data);
	}

	public function get_all_guests($date_filter = null) {
		$this->db->order_by('created_at', 'DESC');
		
		if ($date_filter) {
			$this->db->where('DATE(created_at)', $date_filter);
		}
		
		return $this->db->get('guests')->result();
	}
}