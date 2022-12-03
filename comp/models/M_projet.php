<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Projet extends CI_Model 
{
	var $table = "Projet";
	var $column = array('ProjetName'); 
	var $order = array('ProjetName' => 'asc'); 
	var $id_table = 'ProjetId'; 

	public function __construct()
	{
		parent::__construct();
	}

	public function get_Societe()
	{
		$this->db->select('*');
		$this->db->from('Societe');
		$this->db->where('SocieteId !=', 0);
		$this->db->order_by("SocieteName", "asc");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_pos($reg)
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->select('*');
		if($reg!=0)
			$this->db->where('FkSociete', $reg);
		$this->db->order_by("ProjetName", "asc");
		$query = $this->db->get();
		return $query->result();
	}

	public function _get_datatables_query()
	{
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

	function count_filtered($reg)
	{
		$this->_get_datatables_query();
		if($reg!=0)
			$this->db->where('FkSociete', $reg);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($reg)
	{
		$this->db->from($this->table);
		if($reg!=0)
			$this->db->where('FkSociete', $reg);
		return $this->db->count_all_results();
	}
}