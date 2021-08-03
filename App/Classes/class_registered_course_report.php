<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_registered_course_report
 *
 * @author Wael
 */
include_once 'pdf/fpdf17/fpdf.php';
class class_registered_course_report  extends FPDF{
        //Page header
        
   function Header()
{
    //Logo
    $this->Image('logo1.png',10,10,50,20);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Move to the right
    $this->Cell(80);
    //Title
      //  $this->SetFillColor(128,128,128);

    $this->Cell(100,20,'Report #1 Registered Courses ',0,0,'C');
    //Line break
    $this->Ln(20);
}
//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
     $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
function EventTable($array)
{
    $this->SetFont('','B','24');
    $this->Ln();

    $this->SetXY( 10, 45 );

    $this->SetFont('','B','10');
    $this->SetFillColor(200,200,100);
    $this->SetTextColor(255);
    $this->SetDrawColor(200,200,100);
    $this->SetLineWidth(.9);

    //$this->Cell(30,7,"Arabic Name",1,0,'C',true);
    $this->Cell(30,7,"Englis Name",1,0,'C',true);
    $this->Cell(50,7,"English Code",1,0,'C',true);
    $this->Cell(60,7,"Credit Hours",1,0,'C',true);
    $this->Ln();
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);

    $fill = false;

    foreach($array as $a)
    {
        $this->SetFont('Times','I',10);
        $this->Cell(30,7,$a[0],'LR',0,'L',$fill);
        $this->Cell(50,7,$a[1],'LR',0,'L',$fill);
        $this->SetFont('Times','B',10);
        $this->Cell(60,7,$a[2],'LR',0,'L',$fill);
       // $this->Cell(70,6,$a[3].$a[4],'LR',0,'R',$fill);
        $this->Ln();
        $fill =! $fill;
    }
    $this->Cell(140,0,'','T');
}
}

