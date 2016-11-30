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

					<?php foreach ($salons as $salon) : ?>
						<!-- ici salon est equivalent à $salon[$i] dans la boucle for -->
						<!-- mon href va pointer vers une nouvelle page (salon.php) dans lequel je vais pouvoir récuperer ma variable "id" grace a $_GET['id]-->
					<li>
						<a  href="<?php echo $this->url('see_salon', array('id'=>$salon['id'])) ?>"><?php echo $this->e($salon['nom']); ?></a>

					</li>

				<?php endforeach ; ?>
					<li>
						<a  href="<?php echo $this->url('logout'); ?>" title="se déconnecter de T-Chat">Déconnexion</a>
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

	<script
  			src="https://code.jquery.com/jquery-2.2.4.js"
 			 integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
 			 crossorigin="anonymous">		 
 	</script>

 	<script type="text/javascript"src="<?php echo $this->assetUrl('js/close-flash-messages.js') ?>"></script>
</body>
</html>
<!-- c'est une structure commune que l'on va retrouver sur toute les pages  ctrl f5 pour vider le cache et réactualisé le css-->