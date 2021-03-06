<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\SalonsModel;
use \Plasticbrain\FlashMessages\FlashMessages;

class BaseController extends Controller{
	// on veut que notre engine soit disponible dans toute les methodes.
	// protected car on ne souhaite pas qu"elle soit en public
	/*
		Ce champ va contenir l'engine de plates qui va servir à afficher mes vues
	*/
	protected $engine;

	/*
		Ce champ va contenir une instance de flash messenger de php-flash-message
	*/
	protected $fmsg;


	// -> on initialise notre variable engine
	public function __construct(){
		// je fais appel à la methode __construct de la class parente (controller) ce qui me permet de surcharger cette methode et non la redefinir entierement.
		// -> on souhaite aussi que notre function construct hérite de la classe parent (controller), on reproduit le comportement de la classe parent.
		// le constructeur de la classe parant n'existe pas du coup on a enlever cette fonction
		// parent::__construct();

		// je stocke dans la variable de class engine une instance de League\plates\engine alors que cette instance etait crée directement dans la methode show de controller.

		$this->engine = new \League\Plates\Engine(self::PATH_VIEWS);

		// charger  nos extensions (nos fonctions personnalisées)
		$this->engine->loadExtension(new \W\View\Plates\PlatesExtensions());

		$app =getApp();

		// on instancie un nouveau model de salon et ce model on va l'utiliser pour assigner tout nos salons globalement
		$salonsModel = new SalonsModel();
		$this->fmsg = new \Plasticbrain\FlashMessages\FlashMessages();
		// rend  certaines données disponibles à tous les vue 
		// accesible avec $w_user et $w_current_route dans les fichiers de vue
		$this->engine->addData(
			[
			// on a externaliser notre engine on va l'utilser dans la methode show pour afficher nos vue
			'w_user' 			=> $this->getUser(),
			'w_current_route' 	=>$app->getcurrentRoute(),
			'w_site_name' 		=>$app->getconfig('site_name'),
			'salons' 			=>$salonsModel->findAll(),
			'fmsg'				=>$this->getFlashMessenger()
			]
		);

		
	}
	// on a externaliser notre engine on va l'utilser dans la methode show pour afficher nos vue
	public function show($file, array $data =array()){
		// retirer l'eventuelle extension .php

		$file = str_replace('.php', '', $file);

		// Affiche le template
		echo $this->engine->render($file, $data);
		die();

	}

	// cette methode permet de rajouter quand on en aura envie de nouvelles données global qui seront disponible partout dans toute nos vue

	/**
	cette fonction sert à ajouter des données qui seront disponibles dans toute les vues fabriquée par $this->engine (donct par le biais du controler)

	*/

	/**
	retourne une instance du flash messenger de php-flash-messages 
	@return FlashMessages

	*/

	public function addGlobalData(array $datas){
		$this->engine->addData($datas);
	}

	public function getFlashMessenger(){
		return $this->fmsg;
	}
}