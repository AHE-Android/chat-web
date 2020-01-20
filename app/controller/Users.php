<?php

require_once '../../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class Users{
	protected $database;
	protected $dbname = 'users';

	public function __construct(){
		$account = ServiceAccount::fromJsonFile('../../ahechat-91c01be9bd8b.json');
		$firebase = (new Factory)->withServiceAccount($account)->create();

		$this->database = $firebase->getDatabase();
	}

	public function get(int $id=NULL){
		if(empty($id) || !isset($id)){ return FALSE; }

		if($this->database->getReference($this->dbname)->getSnapshot()->hasChild($id)){
			return $this->database->getReference($this->dbname)->getChild($id)->getValue();
		} else{
			return FALSE;
		}
	}

	public function insert(array $data){
		if(empty($data) || !isset($data)){ return FALSE; }

		foreach ($data as $key => $value) {
			$this->database->getReference()->getChild($this->dbname)->getChild($key)->set($value);
		}

		return TRUE;
	}

	public function delete(int $id){
		if(empty($id) || !isset($id)){ return FALSE; }


		if($this->database->getReference($this->dbname)->getSnapshot()->hasChild($id)){
			$this->database->getReference($this->dbname)->getChild($id)->remove();
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

$users = new Users();

var_dump($users->insert([
	'1' => 'TOMASZ',
	'2'	=> 'ŁUKASZ',
	'3' => 'EMIL'
]));