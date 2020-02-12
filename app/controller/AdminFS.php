<?php

require_once("../interface/PermissionsInterface");

class UserFS extends PermissionsAbstract
{
	function __construct()
	{
		$this->permission = 
			PermissionsInterface::READ_MSG |
			PermissionsInterface::WRITE_MSG |
			PermissionsInterface::CREATE_ROOM |
			PermissionsInterface::RENAME_ROOM |
			PermissionsInterface::DELETE_MSG |
			PermissionsInterface::DELETE_ROOM |
			PermissionsInterface::DELETE_USER
		;
	}
}