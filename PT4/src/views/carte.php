<?php echo $head; ?>
	<body>
		<div id="points" style="display: none">
			<?php echo $points; ?>
		</div>
		<div id="map"></div>
		<div id="back">
			<form method="POST">
				<input type="submit" class="btn btn-danger btn-lg" name="retour" value="Retour"/>
			</form>
		</div>
	</body>
<?php echo $footer; ?>