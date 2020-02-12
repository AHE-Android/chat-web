<?php

require_once("../implements/PermissionInterface");

abstract class PermissionsAbstract implements PermissionInterface
{
	protected $permission = 0;
	abstract function __construct();

	static function checkPermission($userPermission, $permission)
	{
		if($userPermission & $permission)
			return true;

		return false;
	}

	function getPermission()
	{
		return $this->permission;
	}

	function isPermitted($permission)
	{
		if($this->permission & $permission)
			return true;

		return false;
	}

	function renameRoom($roomId)
	{
		if($this->isPermitted(PermissionInterface::RENAME_ROOM)){
			//TODO: Rename room activity
			return true;
		} else {
			//TODO: Don't have permission action 
			return false;
		}
	}

	function deleteMsg($msgId)
	{
		if($this->isPermitted(PermissionInterface::DELETE_MSG)){
			//TODO: Rename room activity
			return true;
		} else {
			//TODO: Don't have permission action 
			return false;
		}
	}

	function deleteRoom($roomId)
	{
		if($this->isPermitted(PermissionInterface::DELETE_ROOM)){
			//TODO: Rename room activity
			return true;
		} else { 
			//TODO: Don't have permission action 
			return false;
		}
	}

	function deleteUser($userId)
	{
		if($this->isPermitted(PermissionInterface::DELETE_USER)){
			//TODO: Rename room activity
			return true;
		} else { 
			//TODO: Don't have permission action
			return false; 
		}
	}
}