<?php 
function get_allowance() {
  $taxyear = $_POST['taxyear'];
  //            0      1      2      3      4      5      6       7       8     9
  //        02/03  03/04  04/05  05/06  06/07  07/08  08/09   09/10   10/11 11/12
	$t1=array(4615,   4615,  4745,  4895,  5035,  5225,  6035,   6475,  6475,  7475);
  $t2=array(1920,   1960,  2020,  2090,  2150,  2230,     0,      0,     0,     0);
  $t3=array(34600, 30500, 31400, 32400, 33300, 34600, 34800,  37400, 37400, 35000);
	$t4=array(22,       22,     22,   22,    22,    22,    20,     20,    20,    20);
		
	// National Insurance CLASSE 4
	
	if ($taxyear == "1")  {$allowance = $t1[0]; $rate10 = $t2[0]; $rate22 = $t3[0]; $rate=$t4[0];}
	if ($taxyear == "2")  {$allowance = $t1[1]; $rate10 = $t2[1]; $rate22 = $t3[1]; $rate=$t4[1];}
	if ($taxyear == "3")  {$allowance = $t1[2]; $rate10 = $t2[2]; $rate22 = $t3[2]; $rate=$t4[2];}
	if ($taxyear == "4")  {$allowance = $t1[3]; $rate10 = $t2[3]; $rate22 = $t3[3]; $rate=$t4[3];}
	if ($taxyear == "5")  {$allowance = $t1[4]; $rate10 = $t2[4]; $rate22 = $t3[4]; $rate=$t4[4];}
	if ($taxyear == "6")  {$allowance = $t1[5]; $rate10 = $t2[5]; $rate22 = $t3[5]; $rate=$t4[5];}
	if ($taxyear == "7")  {$allowance = $t1[6]; $rate10 = $t2[6]; $rate22 = $t3[6]; $rate=$t4[6];}
  if ($taxyear == "8")  {$allowance = $t1[7]; $rate10 = $t2[7]; $rate22 = $t3[7]; $rate=$t4[7];}
  if ($taxyear == "9")  {$allowance = $t1[8]; $rate10 = $t2[8]; $rate22 = $t3[8]; $rate=$t4[8];}
  if ($taxyear == "10") {$allowance = $t1[9]; $rate10 = $t2[9]; $rate22 = $t3[9]; $rate=$t4[9];}

		 
   $value=array($allowance, $rate10, $rate22, $rate);
	return ($value);
	
}

function get_refund() {
   $grosspay = $_POST['grosspay'];
   $taxpaid  = $_POST['taxpaid'];  
   $param    = get_allowance();
   
   $allowance =$param[0];
   $rate10    =$param[1];
   $rate22    =$param[2];
   $rate      =$param[3];  
    
   $vl_10_base=NIL;
   $vl_22_base=NIL;
   $vl_40_base=NIL;
 
   // 1st alowance calculations
   if  ($grosspay > $allowance) {
	   $vl_base=$grosspay - $allowance;
   
       // Calculate 10% Rate
       if      ($vl_base    < $rate10) {        	   		
                $vl_10_base = ($vl_base * 0.10);
       } else { $vl_10_base = ($rate10  * 0.10); 	
	            
	           // Calculate 22% Rate
                  
                  if      (($vl_base - $rate10) < ($rate22 - $rate10)) {        	   		
                           $vl_22_base = ((($vl_base - $rate10) * $rate)/100);
                  } else  {$vl_22_base = ((($rate22 -  $rate10) * $rate)/100);
	   
                     	  // Calculate 40% Rate
                          if      (($vl_base - $rate22) > 0 ) {$vl_40_base = ((($vl_base - $rate22) * 40)/100); }
			      }			  
		}

	   $vl_taxdue = $vl_10_base + $vl_22_base + $vl_40_base;

   	   if     ($vl_taxdue > $taxpaid) {
	          $vl_refund = 0;  
   	   } else {$vl_refund=$taxpaid - $vl_taxdue; } 		              
	     	               
   } else {
       // 100% tax paid 
       $vl_refund=$taxpaid; 
   }
   
   return ($vl_refund); 
}


?>