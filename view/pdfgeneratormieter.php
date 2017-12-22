<?php
include "db.connection.php";
require('./assets/fpdf/fpdf.php');

class PDF extends FPDF
{
    function LoadData($sqlConnection)
    {
        $data = array();
        $res_mieter=mysqli_query($sqlConnection,"SELECT * FROM mieter");

        while ($datensatz=mysqli_fetch_assoc($res_mieter)){

            $line = $datensatz["ID"];
            $line .= ';';
            $line .= $datensatz["Nachname"];
            $line .= ';';
            $line .= $datensatz["Vorname"];
            $line .= ';';
            $line .= $datensatz["Liegenschaft"];
            $line .= ';';
            $line .= $datensatz["Mietzins"];

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

        $w = array(20, 65, 65, 60, 65);

        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();

        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0,0,0);
        $this->SetFont('');


        $fill = false;
        foreach($data as $row)
        {


            $this->Cell($w[0],6,$row[0],'LR','','C',$fill);
            $this->Cell($w[1],6,$row[1],'LR','','L',$fill);
            $this->Cell($w[2],6,$row[2],'LR','','L',$fill);
            $this->Cell($w[3],6,$row[3],'LR','','C',$fill);
            $this->Cell($w[4],6,number_format($row[4],2),'LR','','C',$fill);
            $this->Ln();
            $fill = !$fill;

        }

        $this->Cell(array_sum($w),0,'','T');
    }


    function Header()
    {
        $this->SetFont('Arial','B',20);
        $this->Ln(5);
        $this->Cell(0,0,'Mieter',0,0,'C');
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

$pdf = new PDF();
$pdf->AliasNbPages();
$header = array('ID','Nachname', 'Vorname', 'Liegenschaft', 'Mietzins in CHF');
$data = $pdf->LoadData($link);
$pdf->SetFont('Arial','',14);
$pdf->AddPage('L');
$pdf->FancyTable($header,$data);
$pdf->Output();
?>