<!DOCTYPE html>

<html lang="fr">
<head>
	<!-- on protege nos variables  -->
	<title><?php echo $this->e($title); ?></title>


	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->assetUrl('css/reset.css');?>">
	<link rel="stylesheet" type="text/css"  href="<?php echo $this->assetUrl('css/style.css');?>">
</head>
<body>

	<header>
			<h1><?php echo $this->e($title) ;?></h1>
		</header>
		
		<aside>
			<!-- on crée un lien vers la route -->
			<h3><a href="<?php echo $this->url('default_home'); ?>" title="revenir à l'acceuil">Les salons</h3>
			<nav>
				<ul id="menu-salons">
					<li>
						<a  href="<?php echo $this->url('users_list'); ?>" title="Liste des utilisateurs">Liste des utilisateurs</a> 

					</li>
					<li>
						<a  href="deconnexion.php" title="se déconnecter de T-Chat">Déconnexion</a>
					</li>
				</ul>
				
				
			</nav>
		</aside>





		</aside><main>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>
<!-- c'est une structure commune que l'on va retrouver sur toute les pages  ctrl f5 pour vider le cache et réactualisé le css-->