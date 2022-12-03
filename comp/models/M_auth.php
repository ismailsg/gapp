<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');
	
class M_auth extends CI_Model
{
    
	public function getLogin($user,$mdp)
	{
    	$mdp = sha1($mdp);
        $this->db->select('*');
        $this->db->from('Utilisateur');
        $this->db->where('Login', $user);
        $this->db->where('Mdp', $mdp);
        $check_login = $this->db->get();
    	if($check_login->num_rows() > 0)
    	{
    		$data = $check_login->row();
        	return $data;
        }
        else
        {
            $data = FALSE;
            return $data;
        }
    }

    public function update_cnx($where)
    {
		//$this->db->set('ConnexionDate', 'NOW()', FALSE);
		$sql = "UPDATE Utilisateur Set LastCnx = NOW() Where UserId = ?";
		$query = $this->db->query($sql, array($where));
        //$this->db->update('Utilisateur', $data, $where);
        return 1;
    }
}