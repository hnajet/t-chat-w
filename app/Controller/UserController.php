<?php

namespace Controller;

// use\W\Controller\Controller;
use Model\UtilisateursModel;
use W\Security\AuthentificationModel;

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

	public function login(){
		// on va utiliser le model d'authentification et  plus particulierement la methode isValidLoginInfos à laquelle on passera en param le pseudo email et le password envoyés en post par l'utilisateur, une fois cette verification faite, on récupere l'utilisateur en bdd on le connecte et on le redirige vers la page d'accueil.

		// pour pas envoyer des messages d'erreur sans qu'il y ai des traitements à l'intérieur
		if(!empty($_POST)){

			// je verifie la non vidité du pseudo en post c a d l'existance des variables que l'on attend le mdp et le pseudo
			if(empty($_POST['pseudo'])){
			// si le pseudo est vide ou inexistant on ajoute un message d'erreur
			}
			// je verifie la non vidité du mdp en post
			if(empty($_POST['mot_de_passe'])){
			// si le mdp est vide on ajoute un message d'erreur
			}

			$authentification = new AuthentificationModel(); //c;'est une classe qui permet de voir si les elements de connexion son valide pour pouvoir les utiliser on crée notre model voir ci dessous on s'en sert pour verfier qu'il y ai bien un utilisateur qui aura le mdp et le pseudo.

			if(!empty($_POST['pseudo']) && !empty($_POST['mot_de_passe'])){
				// vérification de l'existence de l'utilisateur (en ayant conjointement le pseudo et le mdp) elle envoi 0 si elle a pas trouvé d'utilisateur
				$idUser = $authentification->isValidLoginInfo($_POST['pseudo'], $_POST['mot_de_passe']);
				// Si l'utilisateur existe bel et bien..(different de 0), 
				if($idUser !==0){
					$utilisateurModel = new UtilisateursModel();
					// je récupére les infos de l'utilisateur en base de donnée et je m'en sert pour le connecter au site a l'aide authentification->logUserin , je récupere les infos grace à l'id(idUser) que j'ai récupérée
					$userInfos = $utilisateurModel->find($idUser);
					$authentification->logUserIn($userInfos); //je l'ai au récupéré je l'ai utiliser pour connecter mon utilisateur, c'est à partir de cette ligne que l'utilisateur est connécté.

					// une fois l'utilisateur connecté on le redirige vers l'acceuil
					$this->redirectToRoute('default_home');

				} else{
					// vos informations de connexion sont incorrectes, on avertit l'utilisateur (les informations que l'on a en base de donnée ne corresponde pas avec les infos que l'utilisateur vient de saisir)
				}
			}

		}
		// elle prend en premiere parametre le chemin vers la vue(user\login), le 2eme parametre cest les data que je vaiss injecter depuis mon controller, on injecte une variable dans notre vue sous le nom de data.
		$this->show('users/login', array('datas'=>isset($_POST) ? $_POST : array()));
										// j'injecte dans ma vue les donnée data, au cas ou l'utilisateur se trompe dans le remplissage de son formulaire et bien data permet en cas d'erreur de préremplir a nouveau le formulaire avec les données que l'utilisateur à rentrée il aura juste à les modifiers plutot que de tout retaper à chaque fois.

	}
	// fonction de déconnexion
	public function logout(){
		$authentification = new AuthentificationModel();
		$authentification->logUserOut();
		$this->redirectToRoute('login');  //lorsque l"on déconnecte on le redirige vers la page login
	}
}