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


$pdf->Ln(6);

$title_page='<h2> ETAT 10 </h2>';
$title_page2='<h2> DECHARGE </h2>';

$pdf->WriteHTMLCell(0,0,'','',$title_page,0,1,1,true,'C',true);
$pdf->Ln(2);
$pdf->WriteHTMLCell(0,0,'','',$title_page2,0,1,1,true,'C',true);
$pdf->WriteHTMLCell(0,0,'','','(Pour sortie de matériel)',0,1,1,true,'C',true);



$pdf->Ln(13);
$pdf->WriteHTMLCell(80,0,'','','BC: 10/2019',0,1,1,true,'L',true);

$NombreLigne=135;
$pas=8.66;
$nbData=7;
$data = array();
	array_push($data, array('aaaaaaaa', 'test', '120','aaaaaaaa', 'test', '120','aaaaaaaa','xxxxxxxxx'));
    array_push($data, array('aaaaaaaa', 'test', '120','aaaaaaaa', 'test', '120','aaaaaaaa','xxxxxxxxx'));
        
    
	$table='<table style="border: 1px solid black; padding 16px;width:100%;">
    		<thead>
              	<tr style="text-align:center;" >
                    <th colspan="3" style=" border: 1px solid black;width:30%">N°d’inventaire</th>
                    <th rowspan="2" style=" border: 1px solid black;width:10%">Code à barre</th>
                    <th rowspan="2" style=" border: 1px solid black;width:30%">DISIGNATION ET DESCRIPTION DES OBJETS</th>
                    <th rowspan="2" style=" border: 1px solid black;width:10%">NBRE</th>
                    <th colspan="2" style=" border: 1px solid black;width:20%">ETAT</th>
              	</tr>
              	<tr>
				    <th style="border: 1px solid black;">Code DR</th>
				    <th style="border: 1px solid black;">Code Famille</th>
				    <th style="border: 1px solid black;">Code Matériel</th>
				    <th style="border: 1px solid black;">A LA SORTIE</th>
				    <th style="border: 1px solid black;">A LA RENTREE</th>
				</tr>
    		</thead>
		';

		foreach ($data as $row)
		{ 
			
	$table.='<tr style="text-align:left;width:100%;">
					<td style="border: 1px solid black; border-right: 1px solid black;width:10%">'.$row[0].'</td>
					<td style="border: 1px solid black; border-right: 1px solid black;width:10%">'.$row[1].'</td>
					<td style="border: 1px solid black; border-right: 1px solid black;width:10%">'.$row[2].'</td>
					<td style="border: 1px solid black; border-right: 1px solid black;width:10%">'.$row[3].'</td>
					<td style="border: 1px solid black; border-right: 1px solid black;width:30%">'.$row[4].'</td>
					<td style="border: 1px solid black; border-right: 1px solid black;width:10%">'.$row[5].'</td>
					<td style="border: 1px solid black; border-right: 1px solid black;width:10%">'.$row[6].'</td>
					<td style="border: 1px solid black; border-right: 1px solid black;width:10%">'.$row[7].'</td>
			</tr>';
	}	
$table.='</table>';
$pdf->Ln();
$pdf->WriteHTMLCell(180,0,'','',$table,0,1,0,true,'C',true);
$pdf->Ln(3);
//line1
$pdf->MultiCell(60, 0, 	' VISA DU CHEF DE SERVICE DEMANDEUR '	, 0, 'C', 1, 0, '', '', true);
$pdf->MultiCell(20, 0, 	' '	, 0, 'L', 1, 0, '', '', true);
$pdf->MultiCell(27, 0, 	' LE PRENEUR (A LA SORTIE) '	, 0, 'C', 1, 0, '', '', true);
$pdf->MultiCell(20, 0, 	' '	, 0, 'L', 1, 0, '', '', true);
$pdf->MultiCell(35, 0,'LE MAGASIGNIER (A L’ENTREE)', 0, 'C', 0, 1, '', '', true);
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
$pdf->Output('example_005.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
