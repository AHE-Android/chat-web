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
}