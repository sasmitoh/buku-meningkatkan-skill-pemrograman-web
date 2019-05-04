<?php 
class Baju{
	var $merk;
 	var $harga;
 	//membuat bebearapa function
 	
 	function getMerk(){
 		echo $this->merk. "<br/>";
 	}

 	function getHarga(){
 		echo $this->harga . "<br/>";
 	}

 	// fungsi spescial constructor
 	function __construct($parameter1, $parameter2){
 		$this->merk = $parameter1;
 		$this->harga = $parameter2;
 	}

}
/**
 * 
 */
class Perusahaan extends Baju
{
	var $brand;

	function setBrand($parameter){
		$this->brand = $penerbit;
	}

	function getBrand(){
		echo $this->brand . "<br/>";
	}

   	 // Fungsi Spesial Construct didalam kelas Perusahaan
	function __construct($parameter1, $parameter2,$parameter3){
		$this->merk = $parameter1;
		$this->harga = $parameter2;
		$this->brand = $parameter3;
	}
}

$trand_baju = new Perusahaan("Cardina", 100000,"cikarang");

$trand_baju->getMerk();
$trand_baju->getHarga();
$trand_baju->getBrand();	
 ?>