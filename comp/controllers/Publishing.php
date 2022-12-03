<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publishing extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('generiq','generiq');
		$this->load->model('m_publishing','publishing');
		$this->generiq->initialise('publishing', array('PublishingID'), array('PublishingID' => 'ASC'), 'PublishingID');
		$this->publishing->initialise('publishing', array('PublishingID'), array('PublishingID' => 'ASC'), 'PublishingID');
	}

	public function index()
	{
		if($this->session->userdata('OP_Logged'))
		{
			if($this->session->userdata('OP_Profil')==="Admin"){
				$data['apps'] = $this->publishing->getApps();
				$this->load->view('v_publishing', $data);
			}else{
				$this->load->view('v_404');
			}
		} else {
			redirect(base_url());	
		}
		
	}
	
	public function ajax_list($id=0)
	{
		$list;
		$list = $this->generiq->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $publishingapp) {
			//if($publishingapp->BenefID!=0)
			//{
				$no++;
				$row = array();
				//$row[] = $publishingapp->AppNumber;
				$row[] = $publishingapp->PublisherName;
				$row[] = $publishingapp->StoreLink;
				$row[] = $publishingapp->StoreID;
				$row[] = $publishingapp->PackageName;
				$row[] = $publishingapp->Status;
				$row[] = $publishingapp->AdAccount;
				$row[] = $publishingapp->MakeOrder;
				$row[] = $publishingapp->Published;
				$row[] = $publishingapp->Price;
				$row[] = $publishingapp->OrderStatus;
				$row[] = $publishingapp->UnsignedApk;
				$row[] = $publishingapp->KeyApk;
				$row[] = $publishingapp->SignedApk;

				if(($this->session->userdata('OP_Profil')) == "Admin" ){
					$row[] = '
					<a class="btn btn-sm btn-warning"  title="Modifier" onclick="_edit('.$publishingapp->PublishingID.')"><i class="glyphicon glyphicon-pencil"></i></a>	
					<a class="btn btn-sm btn-danger" title="Supprimer" onclick="_delete('.$publishingapp->PublishingID.')"><i class="glyphicon glyphicon-trash"></i></a>';		
				}else{
					$row[] = '
					<a disabled class="btn btn-sm btn-danger" title="Supprimer" onclick="_delete('.$publishingapp->PublishingID.')"><i class="glyphicon glyphicon-trash"></i></a>';			
				}
				$data[] = $row;
			//}
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->generiq->count_all($id),
						"recordsFiltered" => $this->generiq->count_filtered($id),
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
		$this->generiq->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function add()
	{
		//$this->_validate();
		$packageName = $this->genererChaineAleatoire();
		if(!($this->CheckApp($packageName))){
			$data = array();
			foreach ($this->input->post('inputs') as $key => $value) {
				$data[$key] =  trim($value);
			}
			
			$data['PackageName'] = $packageName;
			$data['FkApp'] =  $this->input->post('cb_apps2');
			$insert = $this->generiq->save($data);
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array("status" => FALSE));
		}
	}

	public function ajax_update()
	{
		//$this->_validate();
		$data = array();
		foreach ($this->input->post('inputs') as $key => $value) {
			$data[$key] =  trim($value);
		}
		$data['FkApp'] =  $this->input->post('cb_apps2');
		$this->generiq->update(array('PublishingID' => $this->input->post('id')), $data);
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
			if((preg_match("/^[a-zA-Z0-9 @ èéçà.,;':]+$/", $value) != 1))
			{
				$data['inputerror'][] = $key;
				$data['error_string'][] = 'Entrer une chaine valide';
				$data['status'] = FALSE;
			}
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	
	function genererChaineAleatoire($longueur = 10)
	{
		$caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$longueurMax = strlen($caracteres);
		$chaines="com";
		for($j=0 ; $j<2 ; $j++) {
			$chaineAleatoire = '';
			for ($i = 0; $i < $longueur; $i++) {
				$chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
			}
			$chaines.="." ;
			$chaines.= $chaineAleatoire;
		}
		return $chaines;
	}
	
	function CheckApp($package) 
	{
		if (@fopen("https://play.google.com/store/apps/details?id=$package", 'r')) 
			return true ;
		else 
			return false ;
	}
}