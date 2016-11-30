<?php
namespace Validation\Rules;
/**
Description of UsernameNotExist
Cette classe sert à étendre les fonctionnalités de la bibliothèque respect/validation en y ajoutant un nouveau validateur
@author Admin
**/
use Respect\Validation\Rules\AbstractRule;
use W\Model\UsersModel;

class UsernameNotExists extends AbstractRule{
	public function validate($pseudo){
		$userModel = new UsersModel();
		return ! $userModel->usernameExists($pseudo);
	}
}