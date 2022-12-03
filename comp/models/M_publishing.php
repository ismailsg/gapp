<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_publishing extends CI_Model 
{

	var $table ;
	var $column ; //set column field database for order and search
	var $order ; // default order
	var $id_table; 

	public function __construct()
	{
		parent::__construct();
	}
	
	public function initialise($table, $column, $order, $id_table)
	{
		$this->table = $table;
		$this->column = $column;
		$this->order = $order;
		$this->id_table = $id_table;
	}
	
	function getApps(){
		$this->db->select('AppID, AppNumber');
        $this->db->from('Apps');
		$this->db->order_by("AppNumber", "ASC");
		$query = $this->db->get();
		return $query->result();
	}

	function get_data($id=0)
	{
		$this->_get_datatables_query($id);
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->select('*');
		$this->db->from("Publishing");
		$this->db->join('Apps', 'Apps.AppID = Publishing.FkApp');
		if($id!=0)
			$this->db->where('FkApp', $id);
		$query = $this->db->get();
		return $query->result();
	}
	public function _get_datatables_query($id)
	{
		$this->db->select('*');
		$this->db->from("Publishing");
		$this->db->join('Apps', 'Apps.AppID = Publishing.FkApp');
		if($id!=0)
			$this->db->where('FkApp', $id);
		$query = $this->db->get();

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
	public function save($data, $_table){
		$this->db->insert($_table, $data);
		return $this->db->insert_id();
	}
	function count_filtered($br)
	{
		$this->_get_datatables_query($br);
		$this->db->select('*');
		$this->db->from("Publishing");
		$this->db->join('Apps', 'Apps.AppID = Publishing.FkApp');
		if($id!=0)
			$this->db->where('FkApp', $id);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function count_all($br)
	{
		$this->db->select('*');
		$this->db->from("Publishing");
		$this->db->join('Apps', 'Apps.AppID = Publishing.FkApp');
		if($id!=0)
			$this->db->where('FkApp', $id);
		return $this->db->count_all_results();
	}
}