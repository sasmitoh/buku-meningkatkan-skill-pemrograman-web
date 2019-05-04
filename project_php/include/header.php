<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../img/sas.png" rel="icon">
    <meta name="description" content="Project final ngoding study club">
    <meta name="author" content="Sasmitoh Rahmad Riady, S.Kom">
	<title><?php echo $title; ?></title>

	<!-- link css -->
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" type="text/css">
	<script src="http://code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js" type="text/javascript"></script>
	
</head>
<body>
	<!-- membuat container -->
	<div id="container">
		<!-- membuat header -->
		<header>
			<?php echo $image; ?>
			<h1>Ngoding Study Club</h1><br/>
			<h2>Merajut mimpi dalam mewujutkan mahasiswa kreatif dan berprestasi</h2>
		</header>

<script>
	$(function() {
    	$( "#datepicker" ).datepicker();
  	});
</script>