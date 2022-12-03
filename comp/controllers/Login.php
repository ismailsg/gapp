<?php

header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth','auth');
	}

	public function connexion()
	{
		$login = $this->input->post('Login');
		$mdp = $this->input->post('Mdp');
		if($login !='' and $mdp != '')
		{
			$login = trim($login);
			$chek = $this->auth->getLogin($login,$mdp);
			if ($chek!=FALSE) {
		    	$data = array(
		    		'OP_ID'=>$chek->UserID,
                	'OP_Login'=>$chek->Login,
                	'OP_Nom'=>$chek->Nom,
					'OP_Prenom'=>$chek->Prenom,
					'OP_Profil'=>$chek->Profil,
                	/*OP_positionName'=>$chek->positionName,
                	'OP_Region'=>$chek->RegionID,
                	'OP_RegionName'=>$chek->RegionName,*/
                	'OP_Logged'=>true
                );
                //$last_cnx = array('ConnexionDate' => date('Y-m-d H:i:s'));
                //$this->auth->update_cnx(array('UserID' => $chek->UserID), $last_cnx);
		    	//$this->auth->update_cnx($chek->UserId);
				$this->session->set_userdata($data);
				echo json_encode(array("status"=>"TRUE"));    
		    } else {
                echo json_encode(array("status" => "FALSE"));   
		    	exit(); 
			}
		} else {
			echo json_encode(array("status" => FALSE));
			exit();	
		}
	}

	public function logout()
	{

		//$this->session->unset_userdata('OP_Login');
		//$this->session->unset_userdata('OP_Logged');
		//$this->session->unset_userdata('OP_Nom');
		//$this->session->unset_userdata('OP_Prenom');
		//$this->session->unset_userdata('OP_Profil');
		//$this->session->unset_userdata('OP_position');
		$this->session->sess_destroy();
		redirect(base_url());
	}
}