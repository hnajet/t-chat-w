<?php

namespace Model;

use \W\Model\Model;
use \PDO;
/**
ce fichier fait le lien entre notre application le controller et la base de donnée de message

**/
class MessagesModel extends Model{
/**
cette fonction selectionne tous les messages d'un salon en les associant avec les infos de leurs utilisateurs respectif
le param de type int $idSalon l'id du salon salon dont on souhaite récupérer les messages
le return array la liste des messages avec les infos utilisateurs

**/

	public function searchAllWithUserInfos($idSalon){
		// on construit notre requête
		$query = "SELECT * FROM $this->table "
		."JOIN utilisateurs ON $this->table.id_utilisateur = utilisateurs.id "
		."WHERE id_salon = :id_salon"; //on crée un allias pour se protéger des injections sql

		// ici on récupére tout les messages (this table parce que en faite le framework est intélligent il c'est que l'"on souhaite selectionner les message par rapport au nom de la class message.")
		// associé aux utilisateurs qui sont posté dans les salons


		//	/**
	 // * Constructeur : on fait appel a la methode contruct lorsque lon instancie un objet qui se trouve dans model à la ligne 23 // elle initialise la connection a la base de donnée
	 // */

		// $stmt =statement on l'appel comme on le souhaite
		// voir tchat salon , dbh = pdo

		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(':id_salon', $idSalon); //on liee les deux valeurs
	// 	/ on délègue à dbh (PDO) l'injection de nos valeurs afin de se protéger contres les injections SQL
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC); //la on parcourt tout le tableau avec un fetchAssoc voir connexion model à l'instanciation de pdo, fetch assoc c'est pour récupérer toute nos données de pdo dans un tableau associatif
	}
}
