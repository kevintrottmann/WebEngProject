<?php

session_start();
if(!isset($_SESSION['userid'])){
    header("location:http://photoca.se/index.php");
}

include "db.connection.php";
require('./assets/fpdf/fpdf.php');


class PDF extends FPDF
{
    public $padding = 10;

    function LoadData($sqlConnection)
    {
        $data = array();
        $res_rechnung = mysqli_query($sqlConnection, "SELECT * FROM rechnungen");

        while ($datensatz = mysqli_fetch_assoc($res_rechnung)) {

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
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B');

        $w = array(10, 20, 45, 130, 30, 35);

        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
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
        $this->Cell(0,0,'Rechnung',0,0,'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,'C');
        $this->Cell(0,10,'Photoca.se',0,0,'R');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$header = array('ID','Typ', 'Art', 'Rechnungstext', 'Datum', 'Betrag in CHF');
$data = $pdf->LoadData($link);
$pdf->SetFont('Arial','','8');
$pdf->AddPage('L');

$pdf->FancyTable($header,$data);
$pdf->Output();
?>