<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Allowance extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ajax_Model');
	}


public function ajax_person()
	{	
		if($this->input->post()){
			$data['csrf'] = array(
                'csrfHash' => $this->security->get_csrf_hash()
                );

			$data['person']=$this->Ajax_Model->find_person($this->input->post("searchTerm"));
			if (count($data['person'])>0) {
				header('Content-Type: application/json');
				header('Pragma: no-cache');
				header('Cache-Control: no-store, no-cache');
				echo json_encode($data);
			}
			else {
				echo json_encode($data);
			}
		}	
	}
}