<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Stage House</title>
		<link href="stylesheets/bootstrap.css" media="all" rel="stylesheet" type="text/css">
		<link href="stylesheets/bootstrap-theme.css" media="all" rel="stylesheet" type="text/css">
		<link href="stylesheets/style.css" media="all" rel="stylesheet" type="text/css">
        <meta name="viewport" content="user-scalable=no, initial-scale = 1, minimum-scale = 1, maximum-scale = 1, width=device-width">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		<!--[if gte IE 9]>
		  <style type="text/css">
		    .gradient {
		       filter: none;
		    }
		  </style>
		<![endif]-->
	</head>
	<body>
		<header>
			<div id="banner">
				<div><a href="index.php" id="logo"></a></div>
				<div id="icone-menu" title="Cliquer pour afficher les menus">
					<div id="trait-container">
						<div class="trait"></div>
						<div class="trait"></div>
						<div class="trait"></div>
					</div>
				</div>
				<div id="navigations" class="gradient">
					<nav>
						<ul>
							<li><a href="index.php">Accueil</a></li>
							<li><a href="index.php?action=add-offer">Dépôt</a></li>
							<li>
								<?php 
								if(isset($_SESSION['auth']))
								{ 
									echo '<a href="index.php?action=profile">Compte</a>';
								}
								else 
									echo '<a href="index.php?action=login">Compte</a>';
							?>
							</li>
							<li><a href="index.php?action=contact">Contact</a></li>
							<li><a href="index.php?action=about">A propos</a></li>							
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<div id="top-line">
			<p>
				<?php 
				if(isset($_SESSION['auth']))
				{ 
					echo 'Bienvenue <span class="user-id">'.$_SESSION['auth'].'</span>';
				}
				else 
					echo "Utilisateur anonyme";
				?>
			</p>
			<p>
				<?php 
				if(isset($_SESSION['auth']))
				{
					echo '<a href="../index.php?action=logout" title="se déconnecter">Se déconnecter</a>';
				}
				else 
					echo '<a href="../index.php?action=login" title="se connecter">Se connecter</a>';
				?>
			</p>
		</div>
