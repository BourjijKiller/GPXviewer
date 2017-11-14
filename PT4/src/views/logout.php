<?php echo $head; ?>

<body class="unique">

	<?php echo $logoutMenu; ?>

	<br><br><br><br><br><br><br><br><br><br><br>
	<div class="container2">
		<section id="content">
			<form method="POST">
				<h1>
					Déconnexion
				</h1>
				<div>
					<h2 style="color: orange; font-weight: bold; font-family: sans-serif;">
						Souhaitez-vous vous déconnecter ?
					</h2>
				</div>
				<div>
					<input type="submit" name="logoutYes" value="Oui"/>
					<input style="margin-left: 14%;" type="submit" name="logoutNo" value="Non"/>
				</div>
			</form>
		</section>
	</div>

	<?php
		echo $flashSuccess;
		echo $flashError;
	?>

	<br><br><br><br><br><br><br><br><br><br><br>

	<!-- Inclusion du footer -->

	<?php echo $footer; ?>