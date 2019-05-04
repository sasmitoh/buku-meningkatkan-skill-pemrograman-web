<?php
	function test() {
		$too = "local variable";
		echo '$too in global scope : '. $GLOBALS['too'] . "<br>";
		echo '$too in current scope : '. $too . "\n";
	} 
	$too = "example content";
	test();
 ?>