<div class="container">
	<form method="post" role="form" enctype="multipart/form-data">
		<div class="col-lg-8 col-lg-push-2">
			<legend style="color: orange;font-weight: bold; font-family: Georgia; font-size: 22px; font-style: oblique;">
				Veuillez insérer votre fichier .GPX ci-dessous
			</legend>
		</div><br><br><br>
		<div class="col-lg-8 col-lg-push-1">
			<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />

			<div class="form-group">
				<label for="fichier" style="font-family: Georgia; font-size:18px; font-style:oblique; font-weight:bold; color:#6600FF;"> Fichier du parcours (Format: .GPX | Taille Max : 1 Mo): </label>
				<input type="file" name="file" id="fichier">
			</div>
		</div><br><br><br><br>

		<div class="col-lg-2 col-lg-push-4">
			<button type="submit" name="submit" class="btn btn-primary btn-lg glyphicon glyphicon-upload"> Upload </button>
		</div>
	</form>
</div>