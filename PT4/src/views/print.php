<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="utf-8">
		<title>
			Carte de tracé
		</title>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="web/css/carte.css">

		<!--BOOTSTRAP CDN-->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!--JQuery CDN -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

		 <!-- GOOGLE API -->
		<script
			src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
		</script>
		<script
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDqzj_ilyP13_vGXOhu2nj4453t6QYaUg&libraries=drawing,places">
		</script>

	</head>
	<body>
		<div id="map"></div>

		<div id="bar">
			<p class="auto">
				<input type="text" id="autoc" placeholder="Entrer votre localisation" />
			</p>
			<p>
				<a id="clear" href="#">Cliquer ici </a> pour nettoyer la carte
			</p>

			<br>
		</div>

		<div id="barcarte">
			<form method="POST">
				<input type="submit" class="btn btn-danger btn-lg" name="retour" value="Retour"/>
			</form>
		</div>

		<!-- JQUERY CDN -->
		<script
			src="//code.jquery.com/jquery-1.10.2.js">
		</script>
		<script
			src="//code.jquery.com/ui/1.11.4/jquery-ui.js">
		</script>

		<!-- JAVASCRIPT -->
		<script 
			src="web/js/carte.js">
		</script>

		<!-- BOOTSTRAP JS CDN-->
		<script 
			type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
		</script>
	</body>
</html>