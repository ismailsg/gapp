	<?php
	//============================================================+
	// File name   : example_005.php
	// Begin       : 2008-03-04
	// Last Update : 2013-05-14
	//
	// Description : Example 005 for TCPDF class
	//               Multicell
	//
	// Author: Nicola Asuni
	//
	// (c) Copyright:
	//               Nicola Asuni
	//               Tecnick.com LTD
	//               www.tecnick.com
	//               info@tecnick.com
	//============================================================+

	/**
	 * Creates an example PDF TEST document using TCPDF
	 * @package 
	 * @abstract 
	 * @author 
	 * @since 
	 */

	// Include the main TCPDF library (search for installation path).
	//require_once('tcpdf_include.php');

	// create new PDF document
	$pdf = new TCPDF("P", PDF_UNIT, "A4", true, 'UTF-8', false);

	// set document information
	//$pdf->SetCreator(PDF_CREATOR);
	//$pdf->SetAuthor('Nicola Asuni');
	//$pdf->SetTitle('TCPDF Example 005');
	//$pdf->SetSubject('TCPDF Tutorial');
	//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

	// set default header data
	//$pdf->SetHeaderData(PDF_HEADER_LOGO, 50, ''.'  ', '');

	// set header and footer fonts
	//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	//$pdf->SetFooterMargin(0);

	// set auto page breaks
	//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set some language-dependent strings (optional)

	// hide line in the header
	// Call before the addPage() method
	$pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);


	if (@file_exists(dirname(__FILE__).'/lang/eng.php'))
	{
		require_once(dirname(__FILE__).'/lang/eng.php');
		$pdf->setLanguageArray($l);
	}

	// ---------------------------------------------------------


	// set font
	$pdf->SetFont('times', '', 10);
	// add a page
	$pdf->AddPage();
	// set cell padding
	$pdf->setCellPaddings(1, 1, 1, 0);
	// set cell margins
	$pdf->setCellMargins(1, 1, 1, 0);
	// set color for background
	$pdf->SetFillColor(255, 255, 255);
	$pdf->SetTextColor(0,0,0);

	$pdf->Image(dirname(__FILE__).'/Capture.png', 8, 5, 200, 20, '', '', '', true, 100);

	$occupant = $iig[1]->Occupant;
	$brnum = $iig[1]->BureauNum;
	$br = $iig[1]->Libelle;
	$pdf->Ln(1);

	$title_page='<h4> ETAT EXHAUSTIF DES ÉQUIPEMENTS, OUTILLAGES, MEUBLES ET OBJETS DIVERS INSCRITS AU LIVRE D\'INVENTAIRE </h4>';
	//$title_page2='<h2> DECHARGE </h2>';

	$pdf->WriteHTMLCell(0,0,'','',$title_page,0,1,1,true,'C',true);
	$pdf->Ln(1);
	//$pdf->WriteHTMLCell(0,0,'','',$title_page2,0,1,1,true,'C',true);
	$pdf->WriteHTMLCell(0,0,'','','Emplacement : '.$br.',   N°: '.$brnum,0,1,1,true,'C',true);
	$pdf->WriteHTMLCell(0,0,'','','Nom et Prénom de l’occupant du local: '.$occupant,0,1,1,true,'C',true);



	//$pdf->Ln(2);
	//$pdf->WriteHTMLCell(80, 0, '', '' ,'ETAT EXHAUSTIF DES ÉQUIPEMENTS, OUTILLAGES, MEUBLES ET OBJETS DIVERS INSCRITS AU LIVRE D\'INVENTAIRE', 0, 1, 1, true, 'L', true);
	
	//$pdf->MultiCell(80, 0, 	' Je soussigne '	, 0, 'L', 1, 0, '', '', true);
	//$pdf->MultiCell(95, 0, 	' atteste avoir pris en charge de la DRSM les objets:', 0, '', 1, 0, '', '', true);

	//$NombreLigne=135;
	//$pas=8.66;
	//$nbData=7;
	$tab_famille = array();
	$data = array();
	//$i=0;

	/*foreach ($iig as $row){
		$tab_famille[$i] = $row->FamilleName;
		$i++;
	}*/
	//for ($i=0; $i<count($famille); $i++){
		
	/*
	foreach ($famille as $line){
		$ctr = 0;
		$str = '';
		$des = '';
		foreach ($iig as $row)
		{
			if($line->FamilleName == $row->FamilleName)
			{
				$str .= $row->ObjetCode.'<br>';
				$codeb .= $row->CodeBarre.'<br>';
				$des = $row->Desgination;
				$ctr++;
			}
		}
		array_push($data, array('06', $line->FamilleName, $str, '', $des, $ctr, ''));
	}
	*/
	$ctr = 0;
	foreach ($iig as $row)
	{
		$str = $row->ObjetCode;
		$codeb = $row->CodeBarre;
		$des = $row->Desgination;
		$ctr++;
		array_push($data, array('06', $row->FamilleName, $str, '', $des, 1, ''));
	}
	
	$table='<table style="border: 1px solid black; padding 16px;width:100%;">
    		<thead>
              	<tr style="text-align:center;" >
                    <th colspan="3" style=" border: 1px solid black;width:24%">N° d\'inveantaire</th>
                    <th rowspan="2" style=" border: 1px solid black;width:10%">Code a barre</th>
                    <th rowspan="2" style=" border: 1px solid black;width:46%">Description des objets</th>
                    <th rowspan="2" style=" border: 1px solid black;width:5%">Nbr</th>
                    <th rowspan="2" style=" border: 1px solid black;width:20%">Observations</th>
              	</tr>
              	<tr>
				    <th style="border: 1px solid black;width:8%">Code DR</th>
				    <th style="border: 1px solid black;width:8%">Code Famille</th>
				    <th style="border: 1px solid black;width:8%">Code Materiel</th> 
				</tr>
    		</thead>
		';

	foreach ($data as $row)
	{ 	
		$table.='<tr style="text-align:left;width:100%;">
					<td style="border: 1px solid black; border-right: 1px solid black;width:8%">'.$row[0].'</td>
					<td style="border: 1px solid black; border-right: 1px solid black;width:8%">'.$row[1].'</td>
					<td style="border: 1px solid black; border-right: 1px solid black;width:8%">'.$row[2].'</td>
					<td style="border: 1px solid black; border-right: 1px solid black;width:10%">'.$row[3].'</td>
					<td style="border: 1px solid black; border-right: 1px solid black;width:46%">'.$row[4].'</td>
					<td style="border: 1px solid black; border-right: 1px solid black;width:5%">'.$row[5].'</td>
					<td style="border: 1px solid black; border-right: 1px solid black;width:20%">'.$row[6].'</td>
			</tr>';
	}	
	$table.='</table>';
	$pdf->Ln();
	$pdf->WriteHTMLCell(180,0,'','',$table,0,1,0,true,'C',true);
	$pdf->Ln(1);
	//line1
	$pdf->MultiCell(35, 0, 	' L\'occupant du local Signé', 0, 'C', 1, 0, '', '', true);
	$pdf->MultiCell(20, 0, 	' '	, 0, 'L', 1, 0, '', '', true);
	$pdf->MultiCell(35, 0, 	' Le Chef du Service Signé'	, 0, 'C', 1, 0, '', '', true);
	$pdf->MultiCell(20, 0, 	' '	, 0, 'L', 1, 0, '', '', true);
	$pdf->MultiCell(35, 0,  ' Le Chargé P.M.G Signé', 0, 'C', 0, 1, '', '', true);
	$pdf->Ln($NombreLigne-($pas*$nbData));



	// move pointer to last page

	//$pdf->lastPage();

	/*
	$soFooter1="-Nota : En cas de perte de l’objet, le preneur se trouvera dans l’obligation de le remplacer";
	$soFooter2="(Paragraphe III-6 de l’instruction n° 868/DAAJ/DLP/SIE du 11 Décembre 2009, relative à la tenue des inventaires).";
	$pdf->MultiCell(190, 0,$soFooter1, 0, 'C', 0, 1, '', '', true);
	$pdf->MultiCell(190, 0,$soFooter2, 0, 'C', 0, 1, '', '', true);
	*/

	//$pdf->Image(dirname(__FILE__).'/capture.png', 8, 255, 200, 20, '', '', '', true, 100);

	// ---------------------------------------------------------

	//Close and output PDF document
	
	ob_end_clean();
	$pdf->Output('ETAT_IIG.pdf', 'I');

	//============================================================+
	// END OF FILE
	//============================================================+
