<?php

namespace Controller;

// use \W\Controller\Controller;

class TestController extends BaseController
{

	/**
	 * Page d'accueil par défaut
	 */
	public function monAction()
	{
		$this->show('test/index');
		// ici on a changé le nom du dossier car avant le dossier c"etait default et le fichier c'etait home (à partir de views)
	}

}