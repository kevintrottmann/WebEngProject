<?php

include "db.connection.php";
require('./assets/fpdf/fpdf.php');

class PDF extends FPDF
{
    function LoadData($sqlConnection)
    {
        $data = array();
        $res_einnahmen=mysqli_query($sqlConnection,"SELECT * FROM einnahmen");
        while ($datensatz=mysqli_fetch_assoc($res_einnahmen)){


            $id_mieter = $datensatz["ID_Mieter"];
            $res_mieter=mysqli_query($sqlConnection,"SELECT * FROM mieter WHERE ID='$id_mieter'");
            $datensatz1=mysqli_fetch_assoc($res_mieter);


            $line = $datensatz["ID"];
            $line .= ';';
            $line .= $datensatz1["Nachname"];
            $line .= ';';
            $line .= $datensatz1["Vorname"];
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

        $w = array(30, 60, 60, 60, 60);

        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();

        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0,0,0);
        $this->SetFont('');


        $fill = false;
        foreach($data as $row)
        {

            $this->Cell($w[0],6,$row[0],'LR',0,'C',$fill);
            $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
            $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
            $this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
            $this->Cell($w[4],6,number_format($row[4],2),'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;

        }

        $this->Cell(array_sum($w),0,'','T');
    }

    function Header()
    {
        $this->SetFont('Arial','B',20);
        $this->Ln(5);
        $this->Cell(0,0,'Einahmen',0,0,'C');
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
$header = array('ID','Nachname', 'Vorname', 'Datum', 'Betrag in CHF');
$data = $pdf->LoadData($link);
$pdf->AddPage('L');
$pdf->SetFont('Arial','',14);
$pdf->FancyTable($header,$data);
$pdf->Output();

?>