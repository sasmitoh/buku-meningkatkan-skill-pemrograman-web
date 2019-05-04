<?php
class Baju{

	public $merk;
	protected $pembuat;

	public function getMerk(){
		echo $this->merk . "<br/>";
	} 

	public function getPembuat(){
		echo $this->pembuat . "<br/>";
	}

} 
/**
 * 
 */
class Perusahaan extends Baju
{
	public $harga;
	
	function __construct($parameter1, $parameter2, $parameter3)
	{
		$this->merk = $parameter1;
		$this->harga = $parameter2;
		$this->pembuat = $parameter3;
	}
}

$kaos = new Perusahaan("cardina", 100000, "Ujang Supriadi");

echo $kaos->getPembuat();

 ?>