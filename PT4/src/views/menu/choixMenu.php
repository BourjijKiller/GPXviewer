<div id="front">
	<div class="site-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-6">
					<div id="templatemo_logo">
						<h1>
							<a href="home">Tracé GPS</a>
						</h1>
					</div>
				</div>
				<div class="col-md-8 col-sm-6 col-xs-6">
					<a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
					<div class="main-menu">
						<ul>
							<li>
								<a style="cursor: pointer" onclick="window.open('home','_self')">Accueil</a>
							</li>
							<?php
							if (isset($_SESSION['username']))
							{ ?>
								<li>
									<a style="cursor: pointer;" onclick="window.open('logout','_self')">Déconnexion</a>
								</li> <?php
							}

							else
							{ ?>
								<li>
									<a style="cursor: pointer;" onclick="window.open('connect','_self')">Connexion</a>
								</li> <?php
							} ?>

							<?php
							if (isset($_SESSION['username']))
							{ ?>
								<li class="selected">
									<a style="cursor: pointer;" onclick="window.open('choix','_self')">Parcours</a>
								</li> <?php
							}

							else
							{ ?>
								<li>
									<a style="cursor: pointer;" onclick="window.open('register','_self')">S'enregistrer</a>
								</li> <?php
							} ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="responsive">
						<div class="main-menu">
							<ul>
								<li>
									<a style="cursor: pointer" onclick="window.open('home','_self')">Accueil</a>
								</li>
								<?php
								if (isset($_SESSION['username']))
								{ ?>
									<li>
										<a style="cursor: pointer;" onclick="window.open('logout','_self')">Déconnexion</a>
									</li> <?php
								}

								else
								{ ?>
									<li>
										<a style="cursor: pointer;" onclick="window.open('connect','_self')">Connexion</a>
									</li> <?php
								} ?>

								<?php
								if (isset($_SESSION['username']))
								{ ?>
									<li class="selected">
										<a style="cursor: pointer;" onclick="window.open('choix','_self')">Parcours</a>
									</li> <?php
								}

								else
								{ ?>
									<li>
										<a style="cursor: pointer;" onclick="window.open('register','_self')">S'enregistrer</a>
									</li> <?php
								} ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>