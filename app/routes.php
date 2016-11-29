<?php
	// quand on essaye d'acceder à localhost/t-chat/public/, l'url qui est réellement reçu est : localhost/t-chat/index.php/
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/test', 'Test#monAction', 'test_index'],
		['GET', '/users','User#listUsers', 'users_list'], 
		['GET|POST', '/salon/[i:id]','Salon#seeSalon', 'see_salon'],
		['GET|POST', '/login','User#login', 'login'],
		['GET', '/logout','User#logout', 'logout'],
		// le nom de la route s'appelle login car dans config il etait appeler par default login
		// Ici on met get et post car on pourra afficher les messages d'un salon mais aussi posté des messages dans un salon

		//c'est dans le troisième paramétres avec les # que l'on fait le lien avec le bon fichier usercontroller ce qui est déterminant ici pour retrouver la route de chaque page on reprend le nom de notre fonction que l"on passe en # comme sur la page du controller  pour Test#monAction ensuite on lui donne un nom : test_index, pareil pour utilisateur le lien : User#listUsers  on le nomme users_list etc  '.
		// chaque action fait appel a son controller

	);
	// testmon action voir testcontroller
	// on declare une route qui sera accecible uniquement par la methode get  cette route va concerner l'url public \ avec le defautlt controler methode home et le nom de la route default home