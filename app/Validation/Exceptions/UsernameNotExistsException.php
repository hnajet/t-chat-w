<?php
namespace Validation\Exceptions;
/**
Description of UsernameNotExistException
@author Admin
**/
use  Respect\Validation\Exceptions\ValidationException;

class UsernameNotExistsException extends ValidationException{
	public static $defaultTemplates =array(
		self::MODE_DEFAULT => [
			"le nom de l'utilisateur existe déjà"
		],
		self::MODE_NEGATIVE => [
			"le nom de l'utilisateur existe déjà"
		]
	);
}