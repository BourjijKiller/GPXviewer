<?php echo $head; ?>

<body class = "choix">

<?php echo $menu; ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-push-4">
				<h1> Choix du type de parcours </h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<br><h2> Bienvenue dans l'espace parcours ! </h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<p> Sur cette page vous allez nous renseigner le type de parcours que vous avez effectué, soit en réalisant en direct votre parcours en dessinant sur une carte Google Maps votre tracé, soit en choisissant d'importer votre parcours déjà réalisé en insérant un fichier GPS (.GPX). Vos parcours seront passés dans la méthode SnapToRoad afin de resortir votre parcours de manière identiques mais en passant par des routes. Par exemple : dans la forêt, dans les champs ou encore au bord de la mer ... <br> Une fois votre type de parcours renseigné vous serez redirigé vers la carte Google Maps, où soit il vous faudra télécharger votre fichier au format .GPX pour pouvoir visualiser votre trajet sur la carte, soit dessiner en direct votre parcours.
				</p>
				<br><p>
					Veuillez nous renseigner le type de parcours suivi, et la méthode que vous voulez utiliser.
				</p>
			</div>
			<div class="col-lg-3 col-lg-push-1">
				<img src="web/images/routes.jpg" class="img-rounded"  style="width: 304px;height: 236px;">
			</div>
		</div>
		<div class="row">
			<form method="POST" role="form">
				<div class="col-lg-5 col-lg-push-1">
					<div class="radio">
						<label>
							<input type="radio" name="choix" value="choix_fonction_snap_to_road"> Parcours le long des routes en utilisant un fichier GPS
						</label>
					</div>
					<div></div>
					<div class="radio">
						<label>
							<input type="radio" name="choix" value="choix_fonction_snap_to_road_2" > Parcours le long des routes en dessinant votre parcours sur la carte
						</label>
					</div>
				</div>
				<br>
				<div class="col-lg-3 col-lg-push-4">
					<img src="web/images/foret.jpg" class="img-rounded" style="width: 304px;height: 236px;">
				</div>
				<br><br><br><br><br>
				<div class="col-lg-3 col-lg-pull-8">
					<button
							type="submit" class="btn btn-info btn-lg" name="Valider"> Valider <span class="glyphicon glyphicon-map-marker"></span>
					</button>
				</div>
			</form>
		</div>
		<br><br><br><br><br><br>
	</div>

<?php
	echo $success;
	echo $error;
	echo $footer;
?>