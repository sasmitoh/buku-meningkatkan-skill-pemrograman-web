<?php
 class Baju{
 	// membuat variable didalam kelas baju
 	var $merk;
 	var $harga;
 	//membuat bebearapa function
 	function SetMerk($parameter){
 		$this->merk = $parameter;
 	}

 	function SetHarga($parameter){
 		$this->harga = $parameter;
 	}

 	function GetMerk(){
 		echo $this->merk. "<br/>";
 	}

 	function GetHarga(){
 		echo $this->harga . "<br/>";
 	}

 }

// object
 $kemeja = new Baju;
 $gamis = new Baju;

// akses method setMerk dan getHarga
 $kemeja->setMerk("Cardinal");
 $gamis->setMerk("hidayah");

 $kemeja->setHarga(100000);
 $gamis->setHarga(150000);

 // menampilkan object
$kemeja->getMerk();
$gamis->getMerk();

$kemeja->getHarga();
$gamis->getHarga();

 ?>