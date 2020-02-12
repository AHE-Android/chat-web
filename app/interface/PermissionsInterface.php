<?php

interface PermissionsInterface
{
	const READ_MSG = 1;
	const WRITE_MSG = 2;
	const CREATE_ROOM = 4;
	const RENAME_ROOM = 8;
	const DELETE_MSG = 16;
	const DELETE_ROOM = 32;
	const DELETE_USER = 64;
	// const BANNED = 128;

	function getPermission();
	function isPermitted($permission);

	static function checkPermission($userPermission, $permission);
}