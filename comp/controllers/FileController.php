<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileController extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->library('pdf_library');
		$this->load->model('generiq','generiq');
		$this->load->model('m_file','bloc');
		$this->generiq->initialise('files', array(''), array(''), 'FileID');
	}	
	
	public function index()
	{
		if($this->session->userdata('OP_Logged'))
		{
			if($this->session->userdata('OP_Profil')==="Admin")
			{
				$data['apps'] = $this->bloc->getApps();
				$this->load->view('v_file',$data);
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
				$row[] = $line->FileName;
				$row[] = $line->AppName;
				
				$row[] = '<a class="btn btn-sm btn-warning"  title="Modifier" onclick="edit('.$line->FileID.')"><i class="glyphicon glyphicon-pencil"></i></a>
				<a class="btn btn-sm btn-danger" title="Supprimer" onclick="_delete('.$line->FileID.')"><i class="glyphicon glyphicon-trash"></i></a>';
				
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
		$FileName = $data->FileName.".json";
		$this->generiq->delete_by_id($id);
		unlink($FileName);
		echo json_encode(array("status" => TRUE));
	}
	public function add()
	{
		//$this->_validate();
		$data = array();
		
		
			//$data[$key] =  trim($value);
			$data["FileName"] = $this->input->post('FileName');
			$data["Content"] = $this->input->post('Content');
			$data["AppKey"] = $this->input->post('cb_apps2');
			$id = $this->generiq->save($data);
			file_put_contents($this->input->post('FileName').'.json', $this->input->post('Content'));
			echo json_encode(array("status" => TRUE));
			
		
		
	}
		
	public function ajax_update()
	{    
	    //$this->_validate();
		$data = array();
		$data['FileName']=$this->input->post('FileName');
		$data['Content']=$this->input->post('Content');
	   
		$this->generiq->update(array('FileID' => $this->input->post('id')), $data);
		file_put_contents($this->input->post('FileName').'.json', $this->input->post('Content'));
		echo json_encode(array("status" => TRUE));
	}
		
}