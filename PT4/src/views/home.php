<?php echo $head; ?>

<body class="accueil">
<!-- Importation du menu de l'index -->

	<?php echo $homeMenu; ?>

	<!-- Bloc contenant le défilement des photos -->
	<div class="site-slider">
		<ul class="bxslider">
			<li>
				<img src="web/images/slider/slide1.jpg" alt="slider image 1">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-right">
							<div class="slider-caption">
								<h2> Bastia ~ Corsica </h2>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li>
				<img src="web/images/slider/slide2.jpg" alt="slider image 2">
				<div class="container caption-wrapper">
					<div class="slider-caption">
						<h2> Maspalomas ~ Gran Canaria </h2>
					</div>
				</div>
			</li>
			<li>
				<img src="web/images/slider/slide3.jpg" alt="slider image 3">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-right">
							<div class="slider-caption">
								<h2> Puerto Rico ~ Gran Canaria </h2>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li>
				<img src="web/images/slider/slide4.jpg" alt="slider image 4">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-right">
							<div class="slider-caption">
								<h2> Nonza ~ Corsica </h2>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li>
				<img src="web/images/slider/slide5.jpg" alt="slider image 5">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-right">
							<div class="slider-caption">
								<h2> Saintes-Maries-de-la-Mer ~ France </h2>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="bx-thumbnail-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div id="bx-pager">
							<a data-slide-index="0" href=""><img src="web/images/slider/thumb1.jpg" alt="image 1" /></a>
							<a data-slide-index="1" href=""><img src="web/images/slider/thumb2.jpg" alt="image 2" /></a>
							<a data-slide-index="2" href=""><img src="web/images/slider/thumb3.jpg" alt="image 3" /></a>
							<a data-slide-index="3" href=""><img src="web/images/slider/thumb4.jpg" alt="image 4" /></a>
							<a data-slide-index="4" href=""><img src="web/images/slider/thumb5.jpg" alt="image 5" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="product-promotion" class="content-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 class="section-title">Accueil</h1>
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
			<div class="row text">
				<div class="col-md-9 col-md-push-1 col-sm-7 col-sm-push-1 msg">
					<h2> Bienvenue sur Tracé GPS !! </h2>
					<p> Vous souhaitez visualiser votre balade sur une carte ou encore préparer votre prochaine balade ?</br> </br>
						Vous êtes tombés sur le bon site web, en effet ici vous pouvez importer vos fichiers .GPX (provenant de vos GPS) pour pouvoir visualiser votre tracé sur une carte Google Maps, vous pouvez aussi préparer votre prochain parcours sur celle-ci grâce à une fonction SnapToRoad. </br> </br>

						C'est vraiment très simple à utiliser: par exemple si vous vous servez d'une application pour vos balades ou vos courses à pied, vous devez simplement récupérer le fichier GPS  généré par cette application(.GPX). Vous devez simplement insérer ce fichier à l'emplacement prévu à cet effet sur notre page
						<?php echo $menuConnected;?>
				</div>
			</div>
		</div>
	</div>

	<!-- Inclusion du footer -->

	<?php echo $footer; ?>