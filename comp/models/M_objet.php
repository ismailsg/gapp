<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_objet extends CI_Model 
{

	var $table = "Objet";
	var $column = array('Desgination','ObjetCode'); 
	var $order = array('ObjetCode' => 'DESC', 'DateInscr' => 'DESC'); 
	var $id_table = 'ObjetID'; 

	public function __construct()
	{
		parent::__construct();
	}
	function get_code_max(){
		$this->db->select_max('ObjetCode');
		$this->db->from('Objet');
		//return $this->db->get('Objet')->row();
		$query = $this->db->get();
		return $query->row();
	}
	
	function getService(){
		$this->db->select('ServiceID, ServiceName');
        $this->db->from('Service');
		$this->db->order_by("ServiceName", "ASC");
		$query = $this->db->get();
		return $query->result();
	}
	
	function getReference(){
		$this->db->select('ReferenceID, ReferenceName');
        $this->db->from('Reference');
		$this->db->order_by("Annee", "DESC");
		$this->db->order_by("ReferenceName", "ASC");
			
		$query = $this->db->get();
		return $query->result();
	}
	function countDesgination($ref, $ser)
	{
		//$this->db->select('COUNT(*) as countDesgination');
		$this->db->select('Desgination, FkFamille');
		$this->db->from('Objet');
		$this->db->where('FkReference', $ref);
		$this->db->where('FkService', $ser);
		$this->db->group_by('Desgination'); 
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
	}
	function get_famille_by($ref, $ser)
	{
		$this->db->select('DISTINCT(FamilleName)');
		$this->db->from("Objet");
		$this->db->join('Famille', 'Objet.FkFamille = Famille.FamilleID');
		$this->db->where('FkService', $ser);
		$this->db->where('FkReference', $ref);
		$query = $this->db->get();
		return $query->result();
	}
	function getFamille(){
		$this->db->select('FamilleID, FamilleName');
        $this->db->from('Famille');
		$this->db->order_by("FamilleName", "ASC");
		$query = $this->db->get();
		return $query->result();
	}
	function imprimer($reference=0, $service=0)
	{
		$this->db->select('ObjetCode, CodeBarre, Desgination, FamilleName, ServiceName, ReferenceName');
		$this->db->from("Objet");
		$this->db->join('Famille', 'Objet.FkFamille = Famille.FamilleID');
		$this->db->join('Service', 'Objet.FkService = Service.ServiceID');
		$this->db->join('Reference', 'Objet.FkReference = Reference.ReferenceID');
		if($service!=0)
			$this->db->where('FkService', $service);
		if($reference!=0)
			$this->db->where('FkReference', $reference);
		$query = $this->db->get();
		return $query->result();
	}
	function get_data($reference=0, $service=0, $famille=0)
	{
		$this->_get_datatables_query($reference, $service, $famille);
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->select('ObjetID, ObjetCode, CodeBarre, Desgination, DateInscr, Etat, ValeurAquisition, ValeurEstimative, FamilleName, ServiceName, ReferenceName');
		$this->db->from("Objet");
		$this->db->join('Famille', 'Objet.FkFamille = Famille.FamilleID');
		$this->db->join('Service', 'Objet.FkService = Service.ServiceID');
		$this->db->join('Reference', 'Objet.FkReference = Reference.ReferenceID');
		if($service!=0)
			$this->db->where('FkService', $service);
		if($reference!=0)
			$this->db->where('FkReference', $reference);
		if($famille!=0)
			$this->db->where('FkFamille', $famille);
		if( ($this->session->userdata('OP_IDService')) != 0)
			$this->db->where('FkService', $this->session->userdata('OP_IDService'));
		//$this->db->order_by("ObjetCode", "DESC");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function _get_datatables_query($reference=0, $service=0, $famille=0)
	{
		//$this->db->from($this->table);
		$this->db->select('ObjetID, ObjetCode, CodeBarre, Desgination, DateInscr, Etat, ValeurAquisition, ValeurEstimative, FamilleName, ServiceName, ReferenceName');
		$this->db->from("Objet");
		$this->db->join('Famille', 'Objet.FkFamille = Famille.FamilleID');
		$this->db->join('Service', 'Objet.FkService = Service.ServiceID');
		$this->db->join('Reference', 'Objet.FkReference = Reference.ReferenceID');
		if($service!=0)
			$this->db->where('FkService', $service);
		if($reference!=0)
			$this->db->where('FkReference', $reference);
		if($famille!=0)
			$this->db->where('FkFamille', $famille);
		if( ($this->session->userdata('OP_IDService')) != 0)
			$this->db->where('FkService', $this->session->userdata('OP_IDService'));
		//$this->db->order_by("ObjetCode", "DESC");
		$this->db->get();

		$i = 0;
	
		foreach ($this->column as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$column[$i] = $item; // set column array variable to order processing
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function count_filtered($reference=0, $service=0, $famille=0)
	{
		$this->_get_datatables_query();
		$this->db->select('ObjetID');
		$this->db->from("Objet");
		$this->db->join('Famille', 'Objet.FkFamille = Famille.FamilleID');
		$this->db->join('Service', 'Objet.FkService = Service.ServiceID');
		$this->db->join('Reference', 'Objet.FkReference = Reference.ReferenceID');
		if($service!=0)
			$this->db->where('FkService', $service);
		if($reference!=0)
			$this->db->where('FkReference', $reference);
		if($famille!=0)
			$this->db->where('FkFamille', $famille);
		if( ($this->session->userdata('OP_IDService')) != 0)
			$this->db->where('FkService', $this->session->userdata('OP_IDService'));
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($reference=0, $service=0, $famille=0)
	{
		$this->db->select('ObjetID');
		$this->db->from("Objet");
		$this->db->join('Famille', 'Objet.FkFamille = Famille.FamilleID');
		$this->db->join('Service', 'Objet.FkService = Service.ServiceID');
		$this->db->join('Reference', 'Objet.FkReference = Reference.ReferenceID');
		if($service!=0)
			$this->db->where('FkService', $service);
		if($reference!=0)
			$this->db->where('FkReference', $reference);
		if($famille!=0)
			$this->db->where('FkFamille', $famille);
		if( ($this->session->userdata('OP_IDService')) != 0)
			$this->db->where('FkService', $this->session->userdata('OP_IDService'));
		return $this->db->count_all_results();
	}
}