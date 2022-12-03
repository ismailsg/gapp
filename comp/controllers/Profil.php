<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_profil','profil');
	}

	public function index()
	{
		if($this->session->userdata('OP_Logged'))
		{
			if($this->session->userdata('OP_Profil')==="Consult" OR $this->session->userdata('OP_Profil')==="Admin" OR $this->session->userdata('OP_Profil')==="VUE"){
				$this->load->view('v_profil');
			}else{
				$this->load->view('v_404');
			}
		} else {
			redirect(base_url());	
		}
	}

	public function get_profil(){
		$data = $this->profil->get_profil($this->session->userdata('OP_ID'));
		echo json_encode($data);
	}

	public function update_profil()
	{
		$this->_validate();
		$this->checkMdp();
		$this->checkPseudo();
		$data = array(
				'Nom' => trim($this->input->post('inputs[Nom]')),
				'Prenom' => trim($this->input->post('inputs[Prenom]')),
				'Login' => trim($this->input->post('inputs[Login]'))
			);
			if(!empty($this->input->post('Password')))
				$data['Password'] = sha1($this->input->post('Password'));
		$this->profil->update(array('UserID' => $this->session->userdata('OP_ID')), $data);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		foreach ($this->input->post('inputs') as $key => $value) {
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

	public function checkMdp()
	{
		if($this->input->post('Mdp2')!=$this->input->post('Password')){
			$data['inputerror'][] = "Mdp2";
			$data['error_string'][] = 'Veuillez confirmer le mot de passe';
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
	}

	public function checkPseudo()
	{
		$pseudo = $this->input->post('inputs[Login]');
		$check = $this->profil->checkPseudo($pseudo, $this->session->userdata('OP_ID'));
		if($check){
			$data['inputerror'][] = "Login";
			$data['error_string'][] = 'Pseudo déja existe!';
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
	}
}