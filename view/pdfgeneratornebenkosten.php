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
    public $padding = 8;

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

        $w = array(10, 40, 70, 25, 35);

        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();

        $this->SetTextColor(0, 0, 0);
        $this->SetFont('');

        $i=0;

        $x0=$x = $this->GetX();
        $y = $this->GetY();


        $fill = false;
        foreach($data as $row)
        {


            $yH = $this->getTableRowHeight($row, $w);
            for($j = 0; $j < count($w) ; $j++)
            {
                $this->SetXY($x, $y);
                $this->Cell($w[$j], $yH, "", 'LRB',0,'',$fill);
                $this->SetXY($x, $y);
                $this->MultiCell($w[$j],6,$row[$j],0,'L');
                $x =$x+$w[$j];
            }

            $y=$y+$yH; //move to next row
            $x=$x0; //start from firt column

        }

    }

    public function getTableRowHeight($row, $w)
    {
        $yH=$this->FontSize; //height of the row
        $temp = array();
        for($j = 0; $j < count($w); $j++)
        {
            $str_w = $this->GetStringWidth($row[$j]);
            $temp[] = (int) $str_w / $w[$j];
        }
        $m_str_w = max($temp);
        if($m_str_w > 1)
        {
            $yH *= $m_str_w;

        }
        $yH += $this->padding;
        return $yH;
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
$pdf->SetFont('Arial','B','12');

$pdf->Cell(130,5,'Photoca.se GmbH',0,1);
$pdf->Cell(130,5,'Von Rollstrasse 10',0,1);
$pdf->Cell(130,5,'4600 Olten',0,1);
$pdf->Cell(130,5,'Rechnungsdatum:'.' '.$date,0.1,1);
$pdf->Cell(130,5,'Rechnungsjahr:'.' '.$jahr,0.1,1);
$pdf->Cell(130,5,'MwSt-Nr: CHE-123.456.789',0.1,1);

$pdf->SetFont('Arial','','10');

$pdf->Cell(130,5,'',0,1);
$pdf->Cell(130,5,'Tele: +41 62 797 00 01',0);
$pdf->Cell(130,5,'Email: photo@ca.se',0);

$pdf->Cell(189,10,'',0.1,1);

$pdf->SetFont('Arial','','8');

$data = $pdf->LoadData($link);
$header = array('ID','Art', 'Rechnungstext', 'Datum', 'Betrag in CHF');
$pdf->FancyTable($header,$data);

$pdf->SetFont('Arial','B','10');
$pdf->Cell(130,5,'',0,1);
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