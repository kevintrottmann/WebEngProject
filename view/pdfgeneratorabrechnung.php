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
        $res_rechnungenall=mysqli_query($sqlConnection,"SELECT * FROM rechnungen WHERE YEAR(Datum)='$jahr'");
        while ($datensatz=mysqli_fetch_assoc($res_rechnungenall)) {


            $line = $datensatz["ID"];
            $line .= ';';
            $line .= $datensatz["Typ"];
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
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial','B');

        $w = array(10, 40, 40, 40, 25, 30);

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
            $this->Cell($w[3],6,$row[3],'1',0,'L',$fill);
            $this->Cell($w[4],6,$row[4],'1',0,'R',$fill);
            $this->Cell($w[5],6,number_format($row[5],2),'1',0,'R',$fill);
            $this->Ln();
            $fill = !$fill;

        }


        $this->Cell(array_sum($w),0,'','T');


    }

    function LoadData2($sqlConnection2)
    {
        $jahr = $_POST['jahr'];

        $data2 = array();
        $res_einnahmen=mysqli_query($sqlConnection2,"SELECT * FROM einnahmen WHERE YEAR(Datum)='$jahr'");
        while ($datensatz2=mysqli_fetch_assoc($res_einnahmen)) {

            $line = $datensatz2["ID"];
            $line .= ';';
            $id_mieter = $datensatz2["ID_Mieter"];

            $res_mieter = mysqli_query($sqlConnection2, "SELECT * FROM mieter WHERE ID='$id_mieter'");
            $datensatz3 = mysqli_fetch_assoc($res_mieter);

            $line .= $datensatz3["Vorname"];
            $line .= ';';
            $line .= $datensatz3["Nachname"];
            $line .= ';';
            $line .= $datensatz2["Datum"];
            $line .= ';';
            $line .= $datensatz2["Betrag"];

            $data2[] = explode(';', utf8_decode($line));
        }

        return $data2;
    }

    function FancyTable2($header2, $data2)
    {
        $this->SetFillColor(12,236,42);
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial','B');

        $w2 = array(10, 55, 55, 30, 35);

        for($i=0;$i<count($header2);$i++)
            $this->Cell($w2[$i],7,$header2[$i],1,0,'C',true);
        $this->Ln();

        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0,0,0);
        $this->SetFont('');


        $fill = false;
        foreach($data2 as $row2)
        {

            $this->Cell($w2[0],6,$row2[0],'1',0,'C',$fill);
            $this->Cell($w2[1],6,$row2[1],'1',0,'L',$fill);
            $this->Cell($w2[2],6,$row2[2],'1',0,'L',$fill);
            $this->Cell($w2[3],6,$row2[3],'1',0,'R',$fill);
            $this->Cell($w2[4],6,number_format($row2[4],2),'1',0,'R',$fill);
            $this->Ln();
            $fill = !$fill;

        }


        $this->Cell(array_sum($w2),0,'','T');


    }


    function Header()
    {
        $this->SetFont('Arial','B',20);
        $this->Ln(5);
        $this->Cell(0,0,'Abrechnung',0,0,'C');
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

$pdf->SetFont('Arial','','10');

$pdf->Cell(130,5,'',0,1);
$pdf->Cell(130,5,'Tele: +41 62 797 00 01',0);
$pdf->Cell(130,5,'Email: photo@ca.se',0);

$pdf->Cell(189,10,'',0.1,1);

$pdf->Cell(10,5,'',0.1);
$pdf->Cell(90,5,'',0.1,1);

$pdf->Cell(189,10,'',0.1,1);

$pdf->SetFont('Arial','','12');

$data = $pdf->LoadData($link);
$header = array('ID','Typ','Art', 'Rechnungstext', 'Datum', 'Betrag in CHF');
$pdf->FancyTable($header,$data);

$pdf->SetFont('Arial','B','14');

$pdf->Cell(130,5,'',0,1);
$pdf->Cell(100,5,'Ausgaben in CHF:',0,0,'R');

$res_resultatall=mysqli_query($link,"SELECT SUM(Betrag)FROM rechnungen WHERE YEAR(Datum)='$jahr'");
while ($datensatz1=mysqli_fetch_assoc($res_resultatall)){

    $line.= $datensatz1['SUM(Betrag)'];
    $ausgaben = $datensatz1['SUM(Betrag)'];

}

$pdf->Cell(60,5,number_format($line,2),0.1, 0,'R');
$pdf->Cell(100,5,'',0,1);
$pdf->Cell(100,5,'',0,1);

$pdf->SetFont('Arial','','12');
$data2 = $pdf->LoadData2($link);

$header2 = array('ID','Vorname', 'Nachname', 'Datum', 'Betrag in CHF');
$pdf->FancyTable2($header2,$data2);

$pdf->SetFont('Arial','B','14');

$pdf->Cell(130,5,'',0,1);
$pdf->Cell(100,5,'Einahmen in CHF:',0,0,'R');

$res_resultatall=mysqli_query($link,"SELECT SUM(Betrag)FROM einnahmen WHERE YEAR(Datum)='$jahr'");
while ($datensatz4=mysqli_fetch_assoc($res_resultatall)){

    $line2.= $datensatz4['SUM(Betrag)'];
    $einahmen = $datensatz4['SUM(Betrag)'];
}

$pdf->Cell(60,5,number_format($line2,2),0.1, 0,'R');
$pdf->Cell(130,5,'',0,1);
$pdf->Cell(130,5,'',0,1);

$total=$einahmen-$ausgaben;
$pdf->Cell(100,5,'Total in CHF:',0,0,'R');
$pdf->Cell(60,5,number_format($total,2),'T', 0,'R');


$pdf->AliasNbPages();

$pdf->Output();
?>