<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_file extends CI_Model 
{

	//var $table = "files";
	var $column = array('FileID, FileName'); 
	var $order = array('FileName' => 'ASC');  
	var $id_table = 'BenefID'; 

	public function __construct()
	{
		parent::__construct();
	}
	
	function getApps()
	{
		$this->db->select('AppID, AppName');
        $this->db->from('Apps');
		$this->db->order_by("AppName", "ASC");
		$query = $this->db->get();
		return $query->result();
	}

	/*function get_data_details2($id)
	{
		$this->db->select('BlocID, BlocName, BlocValue');
		$this->db->from("Blocs");
		$this->db->join('Apps', 'Apps.AppID = Blocs.AppKey');
		$this->db->where("AppKey", $id);
		$query = $this->db->get();
		return $query->result();
	}*/
	
	/*function get_data_details($id)
	{
		$this->db->select('*');
		$this->db->from("Blocs");
		$this->db->join('Apps', 'Apps.AppID = Blocs.AppKey');
		$this->db->where("AppKey", $id);
		$query = $this->db->get();
		return $query->result();
	}
	*/
	/*function get_data2($id)
	{
		$this->db->select('AppID, AppName, PackageName, JsonFileName, JsonFileURL');
		$this->db->from("Apps");
		$this->db->where("AppID", $id);
		$query = $this->db->get();
		return $query->row();
	}
	*/
	function get_data($app=0)
	{
		//$this->_get_datatables_query($app);
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->select('FileID, FileName,AppKey');
		$this->db->from("files");
		$this->db->select('FileID, FileName,AppName,AppKey')->join('Apps', 'Apps.AppID = files.AppKey');
		//$this->db->group_by('Apps.AppID');// add group_by
		//if($app!=0)
			//$this->db->where("DechrgeService", $ser);
		$this->db->order_by('AppName', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function _get_datatables_query($ser=0)
	{
		
		//$this->db->from($this->table);
		
		$this->db->select('AppID, AppName');
		$this->db->from("Apps");
		$this->db->order_by('AppName', 'ASC');
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
	
	function count_filtered($ser=0)
	{
		$this->_get_datatables_query();
		$this->db->select('FileID');
		$this->db->from("files");
		$this->db->order_by('FileName', 'ASC');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($ser=0)
	{
		$this->db->select('FileID');
		$this->db->from("files");
		$this->db->order_by('FileName', 'ASC');
		return $this->db->count_all_results();
	}
	
	public function save($data, $table)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}
	
	public function update($where, $data, $table)
	{
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}
	
	public function delete_by_id($id){
		$this->db->where('BlocID', $id);
		$this->db->delete('Blocs');
	}
}