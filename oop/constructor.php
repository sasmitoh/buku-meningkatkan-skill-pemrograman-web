<?php
class Baju{
	var $merk;
 	var $harga;
 	//membuat bebearapa function
 	
 	function GetMerk(){
 		echo $this->merk. "<br/>";
 	}

 	function GetHarga(){
 		echo $this->harga . "<br/>";
 	}

 	// fungsi spescial constructor
 	function __construct($parameter1, $parameter2){
 		$this->merk = $parameter1;
 		$this->harga = $parameter2;
 	}

}

// membuat object
 	$kemeja = new Baju("cardinal", 100000);
 	$gamis = new Baju("hidayah", 150000);

 	// memanggil object dan menampilkan
 	$kemeja->getMerk();
 	$kemeja->getHarga();
 	$gamis->getMerk();
 	$gamis->getHarga(); 
 ?>