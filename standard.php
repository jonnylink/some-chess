<?php
function validate($value,$strict=true){
	if(get_magic_quotes_gpc()) 	$value 	= stripslashes($value);
	if(!$strict){
		$value 	= nl2br(strip_tags($value,'<b>'));
		$value	= mysql_real_escape_string(preg_replace('/(http:[\S]*)/','<a href="\1" target="_new">\1</a>',$value));
	}else{
		$value 	= mysql_real_escape_string(strip_tags($value));
	}
	return $value;
}
function online(){
	$queryOnline = 'UPDATE '.dbPre.'players SET online="1", timeOnline="'.date(YmdHi).'" WHERE id="'.$_SESSION['id'].'" LIMIT 1';
	mysql_query($queryOnline)or die('<div class="error">'.errorDBStr.' (ut-1)</div>');
}
?>