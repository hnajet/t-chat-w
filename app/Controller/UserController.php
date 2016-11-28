<?php

namespace Controller;

// use\W\Controller\Controller;
use Model\UtilisateursModel;

class UserController extends BaseController{ //ça veut dire user controller dépends de controller voir le chemin ci dessus

	// cette fonction sert à afficher la liste des utilisateurs

	public function listUsers(){
		$usersList = array(
			'Googleman', 'Pausewoman','Najet','Laura'
			);

		// ici j'instancie depuis l'action du contrôleur un modèle d'utilisateurs pour pouvoir accéder à la liste des utilisateurs


		$usersModel = new UtilisateursModel();



		$usersList = $usersModel->findAll(); //pour afficher toute la liste des utilsateurs

		// on utilise la méthode findAll qui se trouve dans le dossier W model de model pour rappel on à récupérer la méthode model car on la extends dans utilisateur model class UtilisateursModel extends W\Model\Model{ du coup pour récupérer on fait juste use model\UtilisateurModel

		// La ligne suivante affiche la vue présente dans app/Views/users/list.php Et y injecte le tableau $userList sous un nouveau nom $listUsers
		$this->show('users/list', array('listUsers'=>$usersList));
		// on crée un tableau associatif, on va spécifier que dans la vue on aura une variable qui s'appelle liste user et dans cette variable on aura notre table usersList
	}
}