<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entites extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();;
		$this->load->model('generiq','generiq');
		$this->generiq->initialise('Entite', array('EntiteName'), array('EntiteName' => 'ASC'), 'EntiteID');
	}

	public function index()
	{
		if($this->session->userdata('OP_Logged'))
		{
			if($this->session->userdata('OP_Profil')==="Admin"){
				$this->load->view('v_entites');
			}else{
				$this->load->view('v_404');
			}
		} else {
			redirect(base_url());	
		}
	}
	public function ajax_list()
	{
		$list;
		$list = $this->generiq->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Entites) {
			if($Entites->EntiteID!=0){
				$no++;
				$row = array();
				$row[] = $Entites->EntiteName;
				if(($this->session->userdata('OP_Profil')) == "Admin" ){
					$row[] = '<a class="btn btn-sm btn-warning"  title="Modifier" onclick="_edit('.$Entites->EntiteID.')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" title="Supprimer" onclick="_delete('.$Entites->EntiteID.')"><i class="glyphicon glyphicon-trash"></i></a>';		
				}else{
					$row[] = '<a class="btn btn-sm btn-warning"  title="Modifier" onclick="_edit('.$Entites->EntiteID.')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a disabled class="btn btn-sm btn-danger" title="Supprimer" onclick="_delete('.$Entites->EntiteID.')"><i class="glyphicon glyphicon-trash"></i></a>';			
				}
				$data[] = $row;
			}
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->generiq->count_all(),
						"recordsFiltered" => $this->generiq->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}

	public function edit($id)
	{
		$data = $this->generiq->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_delete($id)
	{
		$data = $this->generiq->get_by_id($id);
		$this->generiq->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function add()
	{
		$this->_validate();
		$data = array();
		foreach ($this->input->post('inputs') as $key => $value) {
			$data[$key] =  trim($value);
		}
		$insert = $this->generiq->save($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_update()
	{
		$this->_validate();
		$data = array();
		foreach ($this->input->post('inputs') as $key => $value) {
			$data[$key] =  trim($value);
		}
		$this->generiq->update(array('EntiteID' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		foreach ($this->input->post('inputs') as $key => $value){
			if($value == '')
			{
				$data['inputerror'][] = $key;
				$data['error_string'][] = 'ce champ est requis';
				$data['status'] = FALSE;
			}
			/*
			if((preg_match("/^[a-zA-Z0-9 @ èéçà-.,;':]+$/", $value) != 1))
			{
				$data['inputerror'][] = $key;
				$data['error_string'][] = 'Entrer une chaine valide';
				$data['status'] = FALSE;
			}
			*/
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}