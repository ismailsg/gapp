<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JFileController extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->library('pdf_library');
		$this->load->model('generiq','generiq');
		$this->load->model('m_jfile','bloc');
		$this->generiq->initialise('jfiles', array(''), array(''), 'JFileID');
	}	
	
	public function index()
	{
		if($this->session->userdata('OP_Logged'))
		{
			if($this->session->userdata('OP_Profil')==="Admin")
			{
				$data['apps'] = $this->bloc->getApps();
				$this->load->view('v_jfile',$data);
			}else{
				redirect(base_url());
			}
		} else {
			redirect(base_url());	
		}
	}
	
	public function ajax_list()
	{
		$list;
		$list = $this->bloc->get_data();
		$data = array();
		foreach ($list as $line) {
				//$no++;
				$row = array();
				$row[] = $line->JFileName;
				$row[] = $line->AppName;
				
				$row[] = '<a class="btn btn-sm btn-warning"  title="Modifier" onclick="edit('.$line->JFileID.')"><i class="glyphicon glyphicon-pencil"></i></a>
				<a class="btn btn-sm btn-danger" title="Supprimer" onclick="_delete('.$line->JFileID.')"><i class="glyphicon glyphicon-trash"></i></a>';
				
				/* <a class="btn btn-sm btn-info" title="Décharge" onclick="bloc('.$line->AppID.')"><i class="glyphicon glyphicon-print"></i></a> */

				$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->bloc->count_all(),
						"recordsFiltered" => $this->bloc->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
		//$i++;
	}
	
	
	
	public function edit($id)
	{
		$data = $this->generiq->get_by_id($id);
		echo json_encode($data);
	}
	
	public function ajax_delete($id)
	{
		$data = $this->generiq->get_by_id($id);
		$FileName = $data->JFileName.".json";
		$this->generiq->delete_by_id($id);
		unlink($FileName);
		echo json_encode(array("status" => TRUE));
	}
	public function add()
	{
		//$this->_validate();
		$data = array();
		$data2 = array();
		
			//$data[$key] =  trim($value);
			$data["JFileName"] = $this->input->post('JFileName');
			$data["Content"] = $this->input->post('Content');
			$data["AppKey"] = $this->input->post('cb_apps2');
			$id = $this->generiq->save($data);
			file_put_contents($this->input->post('JFileName').'.json', $this->input->post('Content'));
			echo json_encode(array("status" => TRUE));
			
		
		
	}
		
	public function ajax_update()
	{    
	    //$this->_validate();
		$data = array();
		$data['JFileName']=$this->input->post('JFileName');
		$data['Content']=$this->input->post('Content');
	   
		$this->generiq->update(array('JFileID' => $this->input->post('id')), $data);
		file_put_contents($this->input->post('JFileName').'.json', $this->input->post('Content'));
		echo json_encode(array("status" => TRUE));
	}
		
}