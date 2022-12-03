<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_profil($user)
	{
		$this->db->select('*');
		$this->db->from('User');
		$this->db->where('UserID', $user);
		$query = $this->db->get();
		return $query->result();
	}

	public function update($where, $data)
	{
		$this->db->update('User', $data, $where);
		return $this->db->affected_rows();
	}

	public function checkPseudo($pseudo, $id_user){
		$this->db->select('Login');
        $this->db->from('User');
        $this->db->where('Login', $pseudo);
        $this->db->where('UserID !=', $id_user);
        $check_login = $this->db->get();
    	if($check_login->num_rows() > 0)
    	{
        	return TRUE;
        }
        return FALSE;
	}


}