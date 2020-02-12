<?php

require_once("../services/PermissionsAbstract.php");

class UserFS extends PermissionsAbstract
{
	function __construct()
	{
		$this->permission = 
			PermissionsInterface::READ_MSG |
			PermissionsInterface::WRITE_MSG |
			PermissionsInterface::CREATE_ROOM
		;
	}
}