<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:http://photoca.se/index.php");
}
include "db.connection.php";
require('./assets/fpdf/fpdf.php');
date_default_timezone_set('UTC');
$date = date('j-m-y');
$jahr = $_POST['jahr'];

class PDF extends FPDF
{
    function LoadData($sqlConnection)
    {
        $jahr = $_POST['jahr'];

        $data = array();
        $res_rechnungenneben=mysqli_query($sqlConnection,"SELECT * FROM rechnungen WHERE Typ='Nebenkosten' AND YEAR(Datum)='$jahr'");
        while ($datensatz=mysqli_fetch_assoc($res_rechnungenneben)) {


            $line = $datensatz["ID"];
            $line .= ';';
            $line .= $datensatz["Art"];
            $line .= ';';
            $line .= $datensatz["Rechnungstext"];
            $line .= ';';
            $line .= $datensatz["Datum"];
            $line .= ';';
            $line .= $datensatz["Betrag"];


            $data[] = explode(';', utf8_decode($line));
        }

        return $data;
    }

    function FancyTable($header, $data)
    {
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial','B');

        $w = array(10, 40, 50, 35, 35);

        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();

        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0,0,0);
        $this->SetFont('');


        $fill = false;
        foreach($data as $row)
        {

            $this->Cell($w[0],6,$row[0],'1',0,'C',$fill);
            $this->Cell($w[1],6,$row[1],'1',0,'L',$fill);
            $this->Cell($w[2],6,$row[2],'1',0,'L',$fill);
            $this->Cell($w[3],6,$row[3],'1',0,'R',$fill);
            $this->Cell($w[4],6,number_format($row[4],2),'1',0,'R',$fill);
            $this->Ln();
            $fill = !$fill;

        }


        $this->Cell(array_sum($w),0,'','T');


    }

    function Header()
    {
        $this->SetFont('Arial','B',20);
        $this->Ln(5);
        $this->Cell(0,0,'Nebenkosten',0,0,'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        $this->Cell(0,10,'Photoca.se',0,0,'R');
    }
}

$pdf = new PDF('p', 'mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B','14');

$pdf->Cell(130,5,'Photoca.se GmbH',0,1);
$pdf->Cell(130,5,'Von Rollstrasse 10',0,1);
$pdf->Cell(130,5,'4600 Olten',0,1);
$pdf->Cell(130,5,'Rechnungsjahr:'.' '.$date,0.1,1);
$pdf->Cell(130,5,'Rechnungsdatum:'.' '.$jahr,0.1,1);
$pdf->Cell(130,5,'MwSt-Nr: CHE-123.456.789',0.1,1);

$pdf->SetFont('Arial','','12');

$pdf->Cell(130,5,'',0,1);
$pdf->Cell(130,5,'Tele: +41 62 797 00 01',0);
$pdf->Cell(130,5,'Email: photo@ca.se',0);

$pdf->Cell(189,10,'',0.1,1);

$pdf->Cell(10,5,'',0.1);
$pdf->Cell(90,5,'',0.1,1);

$pdf->Cell(189,10,'',0.1,1);

$pdf->SetFont('Arial','','12');

$data = $pdf->LoadData($link);
$header = array('ID','Art', 'Rechnungstext', 'Datum', 'Betrag in CHF');
$pdf->FancyTable($header,$data);

$pdf->SetFont('Arial','B','14');

$pdf->Cell(130,5,'',0,1);
$pdf->Cell(100,5,'Total in CHF:',0,0,'R');

$res_resultatneben=mysqli_query($link,"SELECT SUM(Betrag) FROM rechnungen WHERE Typ='Nebenkosten' AND YEAR(Datum)='$jahr'");
while ($datensatz1=mysqli_fetch_assoc($res_resultatneben)){

    $line.= $datensatz1['SUM(Betrag)'];

}

$pdf->Cell(60,5,number_format($line,2),0.1, 0,'R');

$pdf->AliasNbPages();
//$header = array('ID','Nachname', 'Vorname','Typ', 'Art', 'Rechnungstext', 'Datum', 'Betrag in CHF');
$data = $pdf->LoadData($link);

//$pdf->SetFont('Arial','',14);

$pdf->Output();
?>