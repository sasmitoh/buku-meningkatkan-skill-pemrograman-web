<?php
function nilai($text="", $jumlah=1){
	for($i=1; $i <= $jumlah; $i++)
		echo $text;
} 
nilai("de", 5);
echo "<br/>";
nilai("berhasil");
 ?>