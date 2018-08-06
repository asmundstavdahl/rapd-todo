<?php

class Task extends \Rapd\PersistableEntity {
	static $fields = [
		"id" => integer::class,
		"body" => string::class
	];

	public function VALIDATE_body($body){
		return strlen($body) > 1;
	}
}
