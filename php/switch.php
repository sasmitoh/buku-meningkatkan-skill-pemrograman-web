<?php
$nama_hari = date("l");
switch ($nama_hari) {
 	case 'sunday':
 	   	echo "minggu";
 		break;
 	case 'monday':
 	   	echo "senen";
 		break;
 	case 'tuesday':
 		echo "selasa";
 		break;
 	default:
 		echo "sabtu";
 } 
 ?>