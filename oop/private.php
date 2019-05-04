<?php
class Baju{
	private $merk;

	public function setMerk($nama_merk){
		$this->merk = $nama_merk;
	}

	public function getMerk(){
		echo $this->merk . "<br/>";
	}

} 

$kaos = new Baju();

$kaos->setMerk("cardinal");

$kaos->getMerk();

 ?>