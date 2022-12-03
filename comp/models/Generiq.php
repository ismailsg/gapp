<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generiq extends CI_Model {

	var $table ;
	var $column ; //set column field database for order and search
	var $order ; // default order
	var $id_table; 

	public function __construct()
	{
		parent::__construct();
	}

	function autocomplete($term){
	    $this->db->where('EntiteName', $term);
	    $query = $this->db->get('Entite');
	    return $query->result(); 
	}

	public function initialise($table, $column, $order, $id_table)
	{
		$this->table = $table;
		$this->column = $column;
		$this->order = $order;
		$this->id_table = $id_table;
	}
	/*
	function get_data()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		 $this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	*/
	function get_data($val=0, $stringID='')
	{
		$this->_get_datatables_query($val, $stringID);
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		if($val!=0 AND $stringID!='')
			$this->db->where($stringID, $val);
		$query = $this->db->get();
		return $query->result();
	}

	function getOperation()
	{
		$query = $this->db->get('Operation');
		return $query->result();
	}

	function getUser()
	{
		$this->db->select('UserID, concat(UserNom, " ", UserPren) AS Nom');
		$this->db->order_by('Nom', 'ASC');
		$this->db->where('UserID >', 0);
		$query = $this->db->get('Utilisateur');
		return $query->result();
	}

	function getNumInfo($num){
		$this->db->select('*');
		$this->db->from('NumInfo');
		$this->db->where('fk_numero =', $num);
		$query = $this->db->get();
		return $query->result();
	}

	function getOpNum($num){
		$this->db->select('OpNumID,DateOp,Commentaire,concat(UserNom, " ", UserPren) AS Nom,OperationName,Number');
		$this->db->from('OpNum');
		$this->db->join('Utilisateur', 'Utilisateur.UserID=OpNum.fk_user');
		$this->db->join('Numero', 'Numero.NumeroID=OpNum.fk_numero');
		$this->db->join('Operation', 'Operation.OperationID=OpNum.fk_operation');
		$this->db->where('fk_numero =', $num);
		$this->db->order_by("DateOp", "asc");
		$query = $this->db->get();
		return $query->result();
	}

	function get_reg()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		 	$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->where('SocieteId !=', 0);
		$query = $this->db->get();
		return $query->result();
	}


	public function _get_datatables_query(){
		
		$this->db->from($this->table);

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
	function count_filtered(){
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function count_all(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	public function get_by_id($id){
		$this->db->from($this->table);
		$this->db->where($this->id_table, $id);
		$query = $this->db->get();
		return $query->row();
	}
	public function update($where, $data){
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function updateEtatCmd($where, $data){
		$this->db->update("Commande", $data, $where);
		return $this->db->affected_rows();
	}
	public function delete_by_id($id){
		$this->db->where($this->id_table, $id);
		$this->db->delete($this->table);
	}
	public function save($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	
	public function saveOpNum($data){
		$this->db->insert('OpNum', $data);
		return $this->db->insert_id();
	}
	
	public function deleteOpNum($id)
	{
		$this->db->where('OpNumID', $id);
		$this->db->delete('OpNum');
	}
	
	public function updateline($id,$column,$value) 
	{
		$this->db->set($column,$value);
		$this->db->where('AppId',$id);
		$this->db->update($this->table);
		return   $this->db->affected_rows();
	}
}