<?php
require('fpdf/fpdf.php');
//Connect to your database
include("con_db.php");
global $db;

$index=0;
$increase=0;
$j=0;
$caseID = filter_input(INPUT_GET, "caseID");
  

   $getdata = $db->Execute("SELECT CASEFOLDERID, POLICYNUMBER, PAYNETREFERENCE, CBZ_TO, CBZ_INITIATOR, REQUEST_DATE, REF, CBZ_DESCRIPTION, CUST_NAME, CBZ_CURRENTACC, REQ_AMOUNT, CUST_ID, RELATION_DECEASED, DEASED_NAME, DATE_OF_DEATH, DATE_OF_COVER FROM EDMSDB.dbo.CFCLAIMS WHERE CASEFOLDERID =$caseID");	
   
   while(!$getdata->EOF)
   {
      $CASEFOLDERID = $getdata->fields[0];
      $POLICYNUMBER  = $getdata->fields[1];
      $PAYNETREFERENCE  = $getdata->fields[2];
      $CBZ_TO  = $getdata->fields[3];
      $CBZ_INITIATOR = $getdata->fields[4];
      $REQUEST_DATE  = $getdata->fields[5];
      $REF  = $getdata->fields[6];
      $CBZ_DESCRIPTION  = $getdata->fields[7];
      $CUST_NAME  = $getdata->fields[8];
      $CBZ_CURRENTACC  = $getdata->fields[9];
      $REQ_AMOUNT  = $getdata->fields[10];
      $CUST_ID  = $getdata->fields[11];
      $RELATION_DECEASED = $getdata->fields[12];
      $DEASED_NAME = $getdata->fields[13];
      $DATE_OF_DEATH  = $getdata->fields[14];
      $DATE_OF_COVER= $getdata->fields[15];
      $getdata->MoveNext();
    }
	   
$i=0;
$getdata = $db->Execute("SELECT CASE_ID, RT_ACTION, ST_STAFFNAME, ST_STAFFROLE, APPROVALDATE
 FROM FDAPPROVALFRM WHERE CASE_ID ='$caseID' ORDER BY APPROVALDATE");

   while(!$getdata->EOF)
   {
      $CASEFOLDERID[$i]  = $getdata->fields[0];
      $RT_ACTION[$i]  = $getdata->fields[1];
      $ST_STAFFNAME[$i]  = $getdata->fields[2];
      $ST_STAFFROLE[$i]  = $getdata->fields[3];
      $APPROVALDATE[$i] = $getdata->fields[4];
      $i++;
      $getdata->MoveNext();
    }


class PDF extends FPDF
{

  var $angle=0;
// Page header
function Header()
{

}

function Rotate($angle, $x=-1, $y=-1)
{
  if($x==-1)
    $x=$this->x;
  if($y==-1)
    $y=$this->y;
  if($this->angle!=0)
    $this->_out('Q');
  $this->angle=$angle;
  if($angle!=0)
  {
    $angle*=M_PI/180;
    $c=cos($angle);
    $s=sin($angle);
    $cx=$x*$this->k;
    $cy=($this->h-$y)*$this->k;
    $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
  }
}

//water marks
function temporaire( $texte )
{
  $this->SetFont('Arial','B',50);
  $this->SetTextColor(203,203,203);
  $this->Rotate(45,55,190);
  $this->Text(55,190,$texte);
  $this->Rotate(0);
  $this->SetTextColor(0,0,0);
}

// Page footer
function Footer()
{
// Position at 1.5 cm from bottom
$this->SetTextColor(0,0,0);
$this->SetY(-15);
//Arial italic 8
$this->SetFont('Arial','BI',9);
//Page number
$date = date('D jS M Y');
$this->SetX(15);
$this->Cell(0,10,'CBZ HOLDINGS ',0,0,'C');
$this->Cell(0,10,$this->PageNo(),0,0,'R');
}
}

function makeMargin($data2,$pdf){
	$cellWidth=130;//wrapped cell width
	$cellHeight=5;//normal one-line cell height
	
	//check whether the text is overflowing
	if($pdf->GetStringWidth($data2) < $cellWidth){
		//if not, then do nothing
		$line=1;
	}else{
		//if it is, then calculate the height needed for wrapped cell
		//by splitting the text to fit the cell width
		//then count how many lines are needed for the text to fit the cell
		
		$textLength=strlen($data2);	//total text length
		$errMargin=5;		//cell width error margin, just in case
		$startChar=0;		//character start position for each line
		$maxChar=0;			//maximum character in a line, to be incremented later
		$textArray=array();	//to hold the strings for each line
		$tmpString="";		//to hold the string for a line (temporary)
		
		while($startChar < $textLength){ //loop until end of text
			//loop until maximum character reached
			while( 
			$pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
			($startChar+$maxChar) < $textLength ) {
				$maxChar++;
				$tmpString=substr($data2,$startChar,$maxChar);
			}
			//move startChar to next line
			$startChar=$startChar+$maxChar;
			//then add it into the array so we know how many line are needed
			array_push($textArray,$tmpString);
			//reset maxChar and tmpString
			$maxChar=0;
			$tmpString='';
			
		}
		//get number of line
		$line=count($textArray);
	}
	
	//write the cells
	
	
	//use MultiCell instead of Cell
	//but first, because MultiCell is always treated as line ending, we need to 
	//manually set the xy position for the next cell to be next to it.
	//remember the x and y position before writing the multicell
	$pdf->MultiCell($cellWidth,$cellHeight,$data2,'');
	
	//return the position for next cell next to the multicell
	//and offset the x with multicell width
}
//get Data from the database 
$tt = 0;
$k = 1;

// Instanciation of inherited clas
  $pdf = new PDF();
  $pdf->AliasNbPages();
  $pdf->SetRightMargin(5);
  $pdf->AddPage();
  
   $pdf->SetFont('Arial', 'B', 10);
   $pdf->Cell(40, 5, "Policy number:", '', 0, 'C');
   $pdf->Cell(30, 5, "$POLICYNUMBER", 'B', 0, 'C');
   $pdf->SetX(125); 
   $pdf->Cell(40, 5, "PayNet Ref:", '', 0, 'C');
   $pdf->Cell(30, 5, "$PAYNETREFERENCE", 'B', 0, 'C');   
    // Line break
    $pdf->Ln(20);
 // Logo
    $pdf->Image('logo-min.png',80,25,50);
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    // Move to the right
    //$pdf->Cell(80);
  // Title
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(189,60,'MEMORANDUM','',0,'C');
	
	$pdf->SetY(60);
	$pdf->Cell(190, 5, "", 'B', 0, 'L');
	
	$pdf->SetY(70); 
    $pdf->SetX(18);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 5, "TO                  :", 0, 'L'); 
	$pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(120, 5, "$CBZ_TO", '', 0, 'L');
   
	$pdf->SetY(80); 
    $pdf->SetX(18);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 5, "FROM            :", 0, 'L'); 
	$pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(120, 5, "$CBZ_INITIATOR", '', 0, 'L');
	
	$pdf->SetY(90); 
    $pdf->SetX(18);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 5, "DATE             :", 0, 'L'); 
	$pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(120, 5, "$REQUEST_DATE", '', 0, 'L');
	
	$pdf->SetY(100); 
    $pdf->SetX(18);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 5, "REF               :", 0, 'L'); 
	$pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(120, 5, "$REF", '', 0, 'L');
	
	$pdf->SetY(110); 
    $pdf->SetX(17);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 5, "SUBJECT      :", 0, 'L'); 
	$pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 5, "$CBZ_DESCRIPTION", '', 0, 'L');
	$pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 5, "-- $CUST_NAME", '', 0, 'L');
	
							 
	 $pdf->SetY(112); 
	 $pdf->SetX(17);
	 $pdf->Cell(190, 5, "", 'B', 0, 'L');
	 
	 $pdf->SetY(125); 
	 $pdf->SetX(17);
	 $data2="Kindly debit our current account $CBZ_CURRENTACC with $REQ_AMOUNT and pay ($CUST_NAME & $CUST_ID ) with the same amount in full settlement of her claim in respect of the death of  $RELATION_DECEASED , $DEASED_NAME that occurred on the $DATE_OF_DEATH. The deceased's funeral cover commenced on $DATE_OF_COVER.";
	makeMargin($data2,$pdf);
	
  $pdf->AddPage();											
  $pdf->SetY(156);
  $pdf->SetX(17);   
  $pdf->SetFillColor(230,230,230);
  $pdf->SetFont('Arial', 'B', 9);
  $pdf->Cell(20, 5, "APPROVALS", 0, 'L', true);  

  //staff approvals table 
  $pdf->SetY(162);
  $pdf->SetX(17);  
  $pdf->SetFillColor(230,230,230);
  $pdf->Cell(40, 5, "Action",0, 0, 'L', true); 
  $pdf->SetX(58);  
  $pdf->Cell(55, 5, "Staff Name",0 ,0, 'L', true);
  $pdf->SetX(113);  
  $pdf->Cell(55, 5, "Role", 0,0, 'L', true); 
  $pdf->SetX(163);  
  $pdf->Cell(55, 5, "Date / Time", 0,0, 'L', true); 
  
  //row 1
  while($j<sizeof($RT_ACTION)){
	  $pdf->SetY(168+$increase);
	  $pdf->SetX(17);  
	  $pdf->SetFont('Arial', 'I', 12);   
	  $pdf->Cell(40, 5, "$RT_ACTION[$j]", 0, 'L'); 
	  $pdf->SetX(58);  
	  $pdf->Cell(55, 5, "$ST_STAFFNAME[$j]", 0, 'L');
	  $pdf->SetX(113);  
	  $pdf->Cell(55, 5, "$ST_STAFFROLE[$j]", 0, 'L'); 
	  $pdf->SetX(163);  
	  $pdf->Cell(55, 5, "$APPROVALDATE[$j]", 0, 'L'); 
	  
	 $j++; 
	  $increase=$increase+ 6;
  }
   

  $pdf->Output();
?>