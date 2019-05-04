<?php
/**
  * 
  */
 class Baju
 {
 	var $merk;
 	var $harga;

 	function getMerk(){
 		echo $this->merk . "<br/>";
 	}

 	function getHarga(){
 		echo $this->harga . "<br/>";
 	}
 	
 	function __construct($param1, $param2)
 	{
 		$this->merk = $param1;
 		$this->harga = $param2;

 		# code...
 	}
 } 
 /**
  * 
  */
 class Perusahaan extends Baju
 {
 	var $brand;

 	function getHarga(){
 		echo $this->harga-200 . "<br/>";
 	}

 	function getBrang(){
 		echo $this->brand;
 	}
 	
 	function __construct($param1,$param2,$param3)
 	{
 		$this->merk = $param1;
 		$this->harga = $param2;
 		$this->brand = $param3;
 		# code...
 	}
 }

 $celana = new Perusahaan("cardinal", 50000, "cimahi");

 $celana->getMerk();
 $celana->getHarga();
 $celana->getBrang();
 ?>