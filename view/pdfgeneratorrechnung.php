<?php

session_start();
if(!isset($_SESSION['userid'])){
    header("location:http://photoca.se/index.php");
}

include "db.connection.php";
require('./assets/fpdf/fpdf.php');

class PDF extends FPDF
{
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

        $w = array(20, 45, 45, 75, 35, 45);

        for ($i = 0; $i < count($header); $i++) $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();

        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('');


        $fill = false;

        $i = 0;


        $x0 = $x = $this->GetX();
        $y = $this->GetY();

        foreach ($data as $row) {
            for ($i = 0; $i < 6; $i++) //Avoid very lengthy texts

            {
                $row[$i] = substr($row[$i], 0, 265);
            }

            $yH = 30; //height of the row
            $this->SetXY($x, $y);
            $this->Cell($w[0], $yH, "", 'LRB', 0, '', $fill);
            $this->SetXY($x, $y);
            $this->MultiCell($w[0], 6, $row[0], 0, 'L');


            $this->SetXY($x + $w[0], $y);
            $this->Cell($w[1], $yH, "", 'LRB', 0, '', $fill);
            $this->SetXY($x + $w[0], $y);
            $this->MultiCell($w[1], 6, $row[1], 0, 'L');


            $x = $x + $w[0];
            $this->SetXY($x + $w[1], $y);
            $this->Cell($w[2], $yH, "", 'LRB', 0, '', $fill);
            $this->SetXY($x + $w[1], $y);
            $this->MultiCell($w[2], 6, $row[2], 0, 'L');

            $x = $x + $w[1];
            $this->SetXY($x + $w[2], $y);
            $this->Cell($w[3], $yH, "", 'LRB', 0, '', $fill);
            $this->SetXY($x + $w[2], $y);
            $this->MultiCell($w[3], 6, $row[3], 0, 'L');

            $x = $x + $w[2];
            $this->SetXY($x + $w[3], $y);
            $this->Cell($w[4], $yH, "", 'LRB', 0, '', $fill);
            $this->SetXY($x + $w[3], $y);
            $this->MultiCell($w[4], 6, $row[4], 0, 'L');

            $x = $x + $w[3];
            $this->SetXY($x + $w[4], $y);
            $this->Cell($w[5], $yH, "", 'LRB', 0, '', $fill);
            $this->SetXY($x + $w[4], $y);
            $this->MultiCell($w[5], 6, $row[5], 0, 'L');

            $y = $y + $yH; //move to next row
            $x = $x0; //start from firt column
            $fill = !$fill;
        }
    }


/*
            $this->MultiCell($w[0],'',$row[0],'LR','L',$fill);
            $this->MultiCell($w[1],'',$row[1],'LR','L',$fill);
            $this->MultiCell($w[2],'',$row[2],'LR','L',$fill);
            $this->MultiCell($w[3],'',$row[3],'LR','L',$fill);
            $this->MultiCell($w[4],'',$row[4],'LR','R',$fill);
            $this->MultiCell($w[5],'',number_format($row[5],2),'LR','C',$fill);
            $this->Ln(1);
            $fill = !$fill;

        }

        $this->MultiCell(array_sum($w),'','','T','',false);

    }
*/
    function Header()
    {
        $this->SetFont('Arial','B',20);
        $this->Ln(5);
        $this->Cell(0,0,'Rechnung',0,'C');
        $this->Ln(1);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,'C');
        $this->Cell(0,10,'Photoca.se',0,'R');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$header = array('ID','Typ', 'Art', 'Rechnungstext', 'Datum', 'Betrag in CHF');
$data = $pdf->LoadData($link);
$pdf->SetFont('Arial','',14);
$pdf->AddPage('L');
$pdf->FancyTable($header,$data);
$pdf->Output();
?>