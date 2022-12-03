<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apps extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();;
		$this->load->model('generiq','generiq');
		$this->generiq->initialise('Apps', array('AppName','AppNumber'), array('AppName' => 'ASC'), 'AppID');
	}

	public function index()
	{
		if($this->session->userdata('OP_Logged'))
		{
			if($this->session->userdata('OP_Profil')==="Admin"){
				$this->load->view('v_apps');
			}else{
				$this->load->view('v_404');
			}
		} else {
			redirect(base_url());	
		}
	}
	public function ajax_list()
	{
		$list;
		$list = $this->generiq->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Apps) {
			if($Apps->AppID!=0)
			{ 
				$no++;
				$row = array();
				if( $Apps->AppName != null )
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'AppName\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">'.$Apps->AppName.'</div>' ;   
			    else 
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'AppName\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">null</div>' ; 
                if( $Apps->AppNumber != null ) 
      			$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'AppNumber\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">'.$Apps->AppNumber.'</div>'; 
				else 
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'AppNumber\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">null</div>' ; 	
				if( $Apps->AppType != null )
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'AppType\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)" >'.$Apps->AppType.'</div>'; 
				else 
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'AppType\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">null</div>' ; 	
				if( $Apps->DateCreation != null )
				$row[] = '<div 	onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'DateCreation\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">'.$Apps->DateCreation.'</div>'; 				
				else 
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'DateCreation\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">null</div>' ;
                if( $Apps->JsonFileName != null)
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'JsonFileName\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">'.$Apps->JsonFileName.'</div>';	
                else
                $row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'JsonFileName\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">null</div>' ;					
				if( $Apps->JsonFileURL != null)	
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'JsonFileURL\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">'.$Apps->JsonFileURL.'</div>';//'<a href='.$Apps->JsonFileURL.' target="_blank">'.$Apps->JsonFileURL.'</a>';
                 else 
                 $row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'JsonFileURL\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">null</div>' ;
                if($Apps->RessourcesLink != null)			 
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'RessourcesLink\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)" >'.$Apps->RessourcesLink.'</div>';//'<a href='.$Apps->RessourcesLink.' target="_blank">'.$Apps->RessourcesLink.'</a>';	
				else
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'RessourcesLink\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">null</div>' ;	
				if($Apps->MetaDataLink != null)
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'MetaDataLink\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">'.$Apps->MetaDataLink.'</div>';//'<a href='.$Apps->MetaDataLink.' target="_blank">'.$Apps->MetaDataLink.'</a>';
				else 
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'MetaDataLink\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">null</div>' ;	
				if($Apps->ContentLink != null )
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'ContentLink\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">'.$Apps->ContentLink.'</div>';//'<a href='.$Apps->ContentLink.' target="_blank">'.$Apps->ContentLink.'</a>';
				else 
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'ContentLink\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">null</div>' ;
                if( $Apps->JsonContentLink != null )		
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'JsonContentLink\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)" >'.$Apps->JsonContentLink.'</div>';//'<a href='.$Apps->JsonContentLink.' target="_blank">'.$Apps->JsonContentLink.'</a>';				
				else 
				$row[] = '<div  onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false,updatevalue('.$Apps->AppID.',column=\'JsonContentLink\',this),reload_table();" " onfocus="document.execCommand(\'selectAll\',false,null)">null</div>' ;	
					
				if(($this->session->userdata('OP_Profil')) == "Admin" ){
					$row[] = '<a class="btn btn-sm btn-warning"  title="Modifier" onclick="_edit('.$Apps->AppID.')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" title="Supprimer" onclick="_delete('.$Apps->AppID.')"><i class="glyphicon glyphicon-trash"></i></a>';		
				}else{ /*','.$Apps->JsonFileURL.'*/
					$row[] = '<a class="btn btn-sm btn-warning"  title="Modifier" onclick="_edit('.$Apps->AppID.')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a disabled class="btn btn-sm btn-danger" title="Supprimer" onclick="_delete('.$Apps->AppID.')"><i class="glyphicon glyphicon-trash"></i></a>';			
				}
				$data[] = $row;
			}
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->generiq->count_all(),
						"recordsFiltered" => $this->generiq->count_filtered(),
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
		$data = $this->generiq->get_by_id($id);
		$JsonFileName = $data->JsonFileName;
		$this->generiq->delete_by_id($id);
		unlink($JsonFileName);
		echo json_encode(array("status" => TRUE));
	}
	
	// la modification se fait par double click , c'est la fonction du controller php 
	public function editline()
	{
		$list;
		$list = $this->generiq->updateline($_POST['id'],$_POST['column'],$_POST['value']);    
		echo $_POST['id']." ".$_POST['column']." ".$_POST['value'];
	}
	//fin de la fonction 	
 
public function addRow() {
	$data=array();
	
	
	$data['AppNumber']=$_POST['data'][0];
	$data['AppName']=$_POST['data'][1];
	$data['AppType']=$_POST['data'][2];
	$data['DateCreation']=$_POST['data'][3];
	$data['JsonFileName']=$_POST['data'][4];
	$data['JsonContentLink']=$_POST['data'][5];
	$data['JsonFileURL']=$_POST['data'][6];
	$data['ContentLink']=$_POST['data'][7];
	$data['MetaDataLink']=$_POST['data'][8];
	$data['RessourcesLink']=$_POST['data'][9];
	
    $this->generiq->save($data);
	echo "Waw" ;
}
	
	
	
	
	public function add()
	{
		//$this->_validate();
		$data = array();
		foreach ($this->input->post('inputs') as $key => $value) {
			$data[$key] =  trim($value);
		}
		$data['DateCreation'] =  $this->input->post('DateCreation');
		//$data['JsonFileURL'] =  "http://weconnectvalue.com/json/".$this->input->post('inputs[JsonFileName]');
		$insert = $this->generiq->save($data);
		//$file_name = $this->input->post('inputs[JsonFileName]') . ".json"; 
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array();
		foreach ($this->input->post('inputs') as $key => $value) {
			$data[$key] =  trim($value);
		}
		$data['DateCreation'] =  $this->input->post('DateCreation');
		$data['JsonFileURL'] =  /*"http://weconnectvalue.com/json/".*/$this->input->post('inputs[JsonFileName]');/*.'.json';*/
		$this->generiq->update(array('AppID' => $this->input->post('id')), $data);
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
			/*
			if((preg_match("/^[a-zA-Z0-9 @ èéçà.,;':]+$/", $value) != 1))
			{
				$data['inputerror'][] = $key;
				$data['error_string'][] = 'Entrer une chaine valide';
				$data['status'] = FALSE;
			}
			*/
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}