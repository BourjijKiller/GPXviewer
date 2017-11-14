<?php echo $head; ?>

<body class="register">

<?php echo $menu; ?>

<div id="contact" class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="section-title">Créer un compte</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-2 col-md-8 text-center bigger-text informations">
				<p>
					Merci de renseigner vos informations afin de vous inscrire et de pouvoir accéder à l'ensemble des fonctionnalités de notre site web.
				</p>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6">
				<form method="POST">
					<div class="row contact-form">
						<div class="container">
							<p>Veuillez indiquer votre civilité:</p>
							<label class="radio-inline">
								<input type="radio" name="civilite" value="Monsieur" required> Monsieur
							</label>
							<label class="radio-inline">
								<input type="radio" name="civilite" value="Madame" required> Madame
							</label>
						</div>
						<br><br>
						<fieldset class="col-md-12">
							<input id="nom" type="text" name="nom" placeholder="Nom" required>
						</fieldset>
						<fieldset class="col-md-12">
							<input id="prenom" type="text" name="prenom" placeholder="Prénom" required>
						</fieldset>
						<fieldset class="col-md-12">
							<input type="email" name="email" id="email" placeholder="Email" required>
						</fieldset>
						<fieldset class="col-md-12">
							<input type="text" name="adresse" id="adresse" placeholder="Adresse" required>
						</fieldset>
						<fieldset class="col-md-12">
							<input type="text" name="complement" id="complement" placeholder="Complément d'adresse" required>
						</fieldset>
						<fieldset class="col-md-12">
							<input type="text" name="codePostale" id="codePostale" placeholder="Code postal" maxlength="5" required>
						</fieldset>
						<fieldset class="col-md-12">
							<input type="text" name="ville" id="ville" placeholder="Ville" required>
						</fieldset>
						<fieldset class="col-md-12">
							<input name="identifiant" type="text" placeholder="Identifiant" required>
						</fieldset>
						<fieldset class="col-md-12">
							<input name="password" type="password" placeholder="Mot de passe" required>
						</fieldset>
						<fieldset class="col-md-12">
							<input name="confirm_password" type="password" placeholder="Confirmation du mot de passe" required>
						</fieldset>

					</div>
					<div class="row test">
						<fieldset class="col-md-12">
							<input type="submit" name="send" value="Valider l'inscription" id="submit" class="button">
						</fieldset>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	echo $success;
	echo $error;
	echo $footer;
?>