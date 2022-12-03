<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_export extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_report($reference=0, $service=0, $famille=0)
	{
		/*
		$query = "select RegionName,positionName,NbrDmd,ElvRegul,ElvNotRegul,BvRegul,BvTotalRegul, 
			DATE_FORMAT(DateInsert,'%d/%m/%y %H:%i:%s') AS DateInsert
			from  position p
			INNER JOIN region r ON p.fk_region = r.RegionID
			left join op_position o
			ON p.positionID = o.fk_position
			where ( o.OpID is null 
			or o.DateInsert = (select max(o2.DateInsert) from op_position o2 where o2.fk_position = o.fk_position))
			and positionName != 'Toutes'";
		if($filtr == 'reg')
			if($val!=0) 
				$query = $query . " and r.RegionID=".$val;
			else
				$query = $query . " and r.RegionID=".$this->session->userdata('OP_Region');
		if($filtr == 'prov')
			$query = $query . " and p.positionID=".$val;
		$query .= " ORDER BY RegionName ASC, positionName ASC"; 
		$query .= ", DateInsert DESC"; 
		*/
		$query = "select ObjetID, ObjetCode, CodeBarre, Desgination, DateInscr, Etat, ValeurAquisition, ValeurEstimative, FamilleName, ServiceName, ReferenceName
		from Objet o
		INNER JOIN Famille f ON o.FkFamille = f.FamilleID
		INNER JOIN Service s ON o.FkService = s.ServiceID
		INNER JOIN Reference r ON o.FkReference = r.ReferenceID";
		if($service!=0)
			$query = $query . ' WHERE FkService =' . $service;
		if($reference!=0)
			$query = $query . ' AND FkReference =' . $reference;
		if($famille!=0)
			$query = $query . ' AND FkFamille =' . $famille;
		
		//$query = $query . ' AND DateInscr >="2018-03-20"';
		
		$query = $query . ' ORDER BY DateInscr DESC';
		
		$data = $this->db->query($query);
		return $data;
	}
}

