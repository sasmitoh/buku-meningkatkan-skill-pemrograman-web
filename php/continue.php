<?php
echo "perulangan 1 sampai 10 <br />";
for ($i=1; $i <=10 ; $i++) { 
	if ($i == 3) {
		continue;
	}
 	echo "perulangan ke : " . $i . "<br />";
 } 
 echo "akhir perulangan";
 ?>