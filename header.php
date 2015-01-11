<!DOCTYPE>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php echo $page_title; ?></title>

		<style type="text/css">
			
			.left-margin {
				margin:0 .5em 0 0;
			}

			.right-button-margin {
				margin: 0 0 1em 0;
				overflow: hidden;
			}
		</style>

	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>	   
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css"></style>
		<script type="text/javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			    $('#myTable').dataTable();
			});
		</script>
	</head>
	<body>

		<div class="container">
			<?php
				echo "<div class='page-header'>";
					echo "<h1>{$page_title}</h1>";
				echo "</div>";
			?>
			
		