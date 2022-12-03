<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();;
		$this->load->model('generiq','generiq');
		$this->load->model('m_content','content');
		$this->generiq->initialise('Content', array('Title'), array('Title' => 'ASC'), 'ContentID');
	}

	public function index()
	{
		if($this->session->userdata('OP_Logged'))
		{
			if($this->session->userdata('OP_Profil')==="Admin")
			{
				$data['apps'] = $this->content->getApps();
				$this->load->view('v_content',$data);
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
		$list = $this->content->get_data();
		$data = array();
		foreach ($list as $line) 
		{
				$row = array();
				$row[] = $line->AppName;
				$row[] = $line->ContentFileName;
				$row[] = $line->ContentFileURL;
				$list_details = $this->content->get_data_details($line->AppID);
				$str_Title = '';
				$str_Details = '';
				foreach ($list_details as $rw) {
					$str_Title .= $rw->Title . '<br />';
					$str_Details .= $rw->Details . '<br />';
				}	
				$row[] = $str_Title;	
				$row[] = $str_Details;		
				$row[] = '<a class="btn btn-sm btn-warning"  title="Modifier" onclick="edit('.$line->AppID.')"><i class="glyphicon glyphicon-pencil"></i></a>';
				$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->content->count_all(),
						"recordsFiltered" => $this->content->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data['seulLine'] = $this->content->get_data2($id);
		$data['mulLine'] = $this->content->get_data_details2($id);
		echo json_encode($data);
	}

	public function ajax_delete($id)
	{
		$this->generiq->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function add()
	{
		//$this->_validate();
		$data = array();
		$data2 = array();
		for( $i=0; $i<count($this->input->post('Title')); $i++ ) 
		{
			$data["Title"] = $this->input->post('Title['.$i.']');
			$data["Details"] = $this->input->post('Details['.$i.']');
			$data["ContentAppKey"] = $this->input->post('cb_apps2');
			$id = $this->content->save($data, 'Content');
			
		}
		$data2["ContentFileName"] = $this->input->post('ContentFileName');
		$data2["ContentFileURL"] = "http://weconnectvalue.com/".$this->input->post('ContentFileName');
		$update = $this->content->update(array('AppID' => $this->input->post('cb_apps2')), $data2, "Apps");
		$this->JsonFile($this->input->post('cb_apps2'));		
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_update($nbrLineInUpdtae, $AppID)
	{
		$data['seulLine'] = $this->content->get_data2($AppID);
		$data['mulLine'] = $this->content->get_data_details2($AppID);
		//$this->_validate();
		$data = array();
		for( $i=0; $i<count($this->input->post('Title')); $i++ ) 
		{
			$data["Title"] = $this->input->post('Title['.$i.']');
			$data["Details"] = $this->input->post('Details['.$i.']');
			$id = $this->content->update(array('contentID'=>$this->input->post('id2['.$i.']')), $data, 'Content');
			$data = array();
		}
		if(count($this->input->post('Title')) > $nbrLineInUpdtae)
		{
			$data = array();
			for( $i=$nbrLineInUpdtae; $i<count($this->input->post('Title')); $i++ ){
				$data["Title"] = $this->input->post('Title['.$i.']');
				$data["Details"] = $this->input->post('Details['.$i.']');
				$data["ContentAppKey"] = $this->input->post('id');
				$id = $this->content->save($data, 'Content');
			}
		}
		$this->JsonFile($AppID);
		echo json_encode(array("status" => TRUE));
	}
	
	function JsonFile($appid)
	{
		$list['approw'] = $this->content->get_data2($appid);
		$posts = array();
		$posts = array('AppName' => $list['approw']->AppName, 'PackageName' => $list['approw']->PackageName);
		$list_details = $this->content->get_data_details($list['approw']->AppID);
		foreach ($list_details as $rw) 
		{
			$posts[ $rw->Title ] = $rw->Details;
		}			
		file_put_contents($this->input->post('ContentFileName').'.json', json_encode($posts));
	}
	
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		foreach ($this->input->post('Title') as $key => $value){
			if($value == '')
			{
				$data['inputerror'][] = 'Title'.$key;
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
		/*
		foreach ($this->input->post('Details') as $key => $value){
			if($value == '')
			{
				$data['inputerror'][] = $key;
				$data['error_string'][] = 'ce champ est requis';
				$data['status'] = FALSE;
			}
		}
		*/
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}