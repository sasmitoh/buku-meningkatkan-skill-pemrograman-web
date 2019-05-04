<?php 
class Baju{
	private $merk;
	public $test;

	public function setMerk($nama_merk){
		$this->merk = $nama_merk;
		$this->test = $this->merk;
	}

	public function getMerk(){
		echo $this->test . "<br/>";

	}

} 

$kaos = new Baju();

$kaos->setMerk("cardinal");

echo $kaos->test;
 ?>