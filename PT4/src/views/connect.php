<?php echo $head; ?>

<body class="unique">

	<?php echo $connectMenu; ?>

	<br><br><br><br><br><br><br><br><br><br><br>
	<div class="container2" >

		<section id="content">

			<form method="POST">
				<h1>
					Connexion
				</h1>
				<div>
					<input type="text" name="username" placeholder="Nom d'utilisateur" required="" id="username" />
				</div>
				<div>
					<input type="password" name="password" placeholder="Mot de passe" required="" id="password" />
				</div>
				<div>
					<input type="submit" name="submit" value="Connexion" />
					<a href="#">Mot de passe oublié ?</a>
					<a href="register">S'enregistrer</a>
				</div>
			</form>
		</section>
	</div>
	<?php
		echo $flashSuccess;
		echo $flashError;
	?>
	
	<br><br><br><br><br><br><br><br><br><br><br>

	<?php
		echo $footer;
	?>