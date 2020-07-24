<?php 
include("include/functions.php");
$vl_refund=get_refund();
if   ($vl_refund > 0) {header("Location: refund_yes.php");}
?>          
