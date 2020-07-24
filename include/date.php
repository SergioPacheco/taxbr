<?
function fixDate($val)
{
$dateArray = explode("-", $val);
$val = date("j M Y", mktime(0,0,0, $dateArray[1], $dateArray[2], $dateArray[0]));
return $val;
}
?>