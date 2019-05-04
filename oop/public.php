<?php
class Baju{
	public $merk;

	public function getMerk(){
		echo $this->merk . "<br/>";
	}

} 

$kaos = new Baju();

$kaos->merk = "cardinal";

echo $kaos->merk;

 ?>