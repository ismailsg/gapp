<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jsonfile extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->library('pdf_library');
		$this->load->model('generiq','generiq');
		$this->load->model('m_bloc','bloc');
		$this->generiq->initialise('Blocs', array(''), array(''), 'BlocID');
	}	
	
	public function index($id)
	{
		if($this->session->userdata('OP_Logged'))
		{
			if($this->session->userdata('OP_Profil')==="Admin")
			{
				$data['apps'] = $this->bloc->getApps();
				$data['seulLine'] = $this->bloc->get_data2($id);
				$data['mulLine'] = $this->bloc->get_data_details2($id);
				$this->load->view('v_jsonfile',$data);
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
				$row[] = $line->AppName;
				$row[] = $line->JsonFileName;
				$row[] = '<a href='.$line->JsonFileURL.' target="_blank">'.$line->JsonFileURL.'</a>';	
				$list_details = $this->bloc->get_data_details($line->AppID);
				
				$str_BlocName = '';
				$str_BlocValue = '';
				foreach ($list_details as $rw) {
					$str_BlocName .= $rw->BlocName . '<br />';
					$str_BlocValue .= $rw->BlocValue . '<br />';
				}	
				$row[] = $str_BlocName;	
				$row[] = $str_BlocValue;
				
				$row[] = '<a class="btn btn-sm btn-warning"  title="Modifier" onclick="edit('.$line->AppID.')"><i class="glyphicon glyphicon-pencil"></i></a>';
				
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
	
	public function setValidate($setv, $id)
	{
		if($setv==0)
			$data['Validate'] = 1;
		else
			$data['Validate'] = 0;
		$this->generiq->update(array('blocID' => $id), $data);
		echo json_encode(array("status" => TRUE));
	}
	
	public function imprimer($id)
	{	
		if($id!=0){
			$data['bloc'] = $this->bloc->imprimer($id);
			$data['articles'] = $this->bloc-> get_data_details($data['bloc']->blocID);
		}
        $this->load->view('print/bloc', $data);
		//echo $data->Nom;
	}
	
	public function getProdByRef($val=0)
	{
		$data = $this->vents->getProdByRef($val);
		echo json_encode($data);
	}
	
	public function ajax_edit($id)
	{
		$data['seulLine'] = $this->bloc->get_data2($id);
		$data['mulLine'] = $this->bloc->get_data_details2($id);
		echo json_encode($data);
	}
	
	public function ajax_delete($id)
	{
		$this->bloc->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function add()
	{
		//$this->_validate();
		$data = array();
		$data2 = array();
		for( $i=0; $i<count($this->input->post('BlocName')); $i++ ) 
		{
			//$data[$key] =  trim($value);
			$data["BlocName"] = $this->input->post('BlocName['.$i.']');
			$data["BlocValue"] = $this->input->post('BlocValue['.$i.']');
			$data["AppKey"] = $this->input->post('cb_apps2');
			$id = $this->bloc->save($data, 'Blocs');
			
		}
		$data2["JsonFileName"] = $this->input->post('JsonFileName');
		$data2["JsonFileURL"] = "https://weconnectvalue.com/gapp/".$this->input->post('JsonFileName').'.json';
		$update = $this->bloc->update(array('AppID' => $this->input->post('cb_apps2')), $data2, "Apps");
		
		$this->JsonFile($this->input->post('cb_apps2'));
		
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_update($nbrLineInUpdtae, $AppID)
	{
		$data['seulLine'] = $this->bloc->get_data2($AppID);
		$data['mulLine'] = $this->bloc->get_data_details2($AppID);
		//$this->_validate();
		$data = array();
		$data2 = array();
		for( $i=0; $i<count($this->input->post('BlocName')); $i++ ) 
		{
			//$data[$key] =  trim($value);
			$data["BlocName"] = $this->input->post('BlocName['.$i.']');
			$data["BlocValue"] = $this->input->post('BlocValue['.$i.']');
			$id = $this->bloc->update(array('BlocID'=>$this->input->post('id2['.$i.']')), $data, 'Blocs');
			$data = array();
		}
		
		if(count($this->input->post('BlocName')) > $nbrLineInUpdtae)
		{
			$data = array();
			for( $i=$nbrLineInUpdtae; $i<count($this->input->post('BlocName')); $i++ ){
				$data["BlocName"] = $this->input->post('BlocName['.$i.']');
				$data["BlocValue"] = $this->input->post('BlocValue['.$i.']');
				$data["AppKey"] = $this->input->post('id');
				$id = $this->bloc->save($data, 'Blocs');
			}
		}
		$data2["JsonFileName"] = $this->input->post('JsonFileName');
		$data2["JsonFileURL"] = "https://weconnectvalue.com/gapp/".$this->input->post('JsonFileName').'.json';
		$update = $this->bloc->update(array('AppID' => $AppID), $data2, "Apps");
		$this->JsonFile($AppID);
		echo json_encode(array("status" => TRUE));
	}
	
	function JsonFile($appid)
	{
		$list['approw'] = $this->bloc->get_data2($appid);
		$posts = array();
		$posts = array('AppName' => $list['approw']->AppName, 'PackageName' => $list['approw']->PackageName);
		$list_details = $this->bloc->get_data_details($list['approw']->AppID);
		foreach ($list_details as $rw) 
		{
			$posts[ $rw->BlocName ] = $rw->BlocValue;
		}			
		file_put_contents($this->input->post('JsonFileName').'.json', json_encode($posts));
	}
	
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		
		
		for( $i=0; $i<count($this->input->post('BlocName')); $i++ )
		{
			/*
			if($this->input->post('qte2['.$i.']') == '')
			{
				$data['inputerror'][] = 'qte2['.$i.']';
				$data['error_string'][] = 'ce champ est requis';
				$data['status'] = FALSE;
			}
			/*
			if((preg_match("|[0-9]|", $this->input->post('qte2['.$i.']')) != 1))
			{
				$data['inputerror'][] = 'qte2['.$i.']';
				$data['error_string'][] = 'Entrer un nbr valide';
				$data['status'] = FALSE;
			}
			*/
			if($this->input->post('BlocName['.$i.']') == '0')
			{
				$data['inputerror'][] = "BlocName[".$i."]";
				$data['error_string'][] = 'Veuillez selectionner le produit';
				$data['status'] = FALSE;
			}
		}		
		if($this->input->post('cb_service2') == '0')
		{
			$data['inputerror'][] = "cb_service2";
			$data['error_string'][] = 'Veuillez selectionner le service';
			$data['status'] = FALSE;
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}