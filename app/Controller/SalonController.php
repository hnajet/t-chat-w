<?php

namespace Controller;

// use \W\Controller\Controller;
use Model\SalonsModel;
use Model\MessagesModel;

class SalonController extends BaseController
{

	/**
	 * cette action permet de voir la liste des messages d"un salon, @param int $id du salon dont je cherche à voir les messages.
	 // notre vue c'est salon/see pour ce fichier
	 */
	public function seeSalon($id){
		/**

		* On instancie le modèle des salons de façon à récupérér les informations du salon dont l'id (passée dans l'url)

		**/

		$salonsModel = new SalonsModel();
		$salon = $salonsModel->find($id); //ici ça nous retourne les informations d'un salon par rapport à la clé primaire (l'id)
		/**

		* On instancie le modèle des messages pour récupérer les messages du salon dont l'id est $id

		**/
		$messagesModel = new MessagesModel();
		/**
		
		j'utilise la methode searchAllWithUserInfos propre au model MessageModel qui permet de récuperer les messages avec les infos utilisateur associées
		cette methode me reonvoi l'equivalent d'un fetchAll, c a d un tableau de tableaux

		**/
		$messages = $messagesModel->searchAllWithUserInfos($id);

			// notre vue c'est salon/see pour ce fichier
		$this->show('salons/see', array('salon'=> $salon, 'messages' => $messages));
	}

}



// ----------------------------------------------------------------------------------

						// Explications :
//-----------------------------------------------------------------------------------
			// find (id) est egal à ça :

		// public function find($id)
	// {
	// 	if (!is_numeric($id)){
	// 		return false;
	// 	}

	// 	$sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $this->primaryKey .'  = :id LIMIT 1';
	// 	$sth = $this->dbh->prepare($sql);
	// 	$sth->bindValue(':id', $id);
	// 	$sth->execute();

	// 	return $sth->fetch();
	// }

//pour trouver le fichier W/model/model ligne 99

//--------------------------------------------------------------------





// -*--------------------------------------------------------------------------------

// <!-- Rappel : 

// Pour crée une nouvelle page dans notre vue :

// 1- On crée si besoin un nouveau Controleur comme dans test controlleur ou User Controller ou SalonControler
// 2- Nouvelle action ( c'est la fonction public function mon action , seesalon ou listUsers  dans test controller), l'action va chercher des choses en base de donnéee voir le formulaire, le modele et ensuite elle affiche la vue
// 3- On crée une nouvelle route comme dans route.php
// 4-On crée une vue comme dans views dossier test index.php

//  -->
//--------------------------------------------------------------------------------------