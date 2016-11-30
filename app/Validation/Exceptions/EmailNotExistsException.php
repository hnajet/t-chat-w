<?php
namespace Validation\Exceptions;
/**
Description of UsernameNotExistException
@author Admin
**/
use  Respect\Validation\Exceptions\ValidationException;
class EmailNotExistsException extends ValidationException{
	public static $defaultTemplates =array(
		self::MODE_DEFAULT => [
			"l'email' existe déjà"
		],
		self::MODE_NEGATIVE => [
			"l'email existe déjà"
		]
		);
}