<?php

use \Rapd\View;
use \Rapd\Database;
use \Rapd\Router;

class TodoController {
	use \Rapd\Controller\Prototype;

	public static function list(){
		return View::render("list", [
			"tasks" => Task::findAll()
		]);
	}

	public static function new(){
		if("POST" == $_SERVER["REQUEST_METHOD"]){
			return self::newSubmit();
		}
		return View::render("new", [
			"task" => new Task()
		]);
	}

	public static function edit(int $id){
		if("POST" == $_SERVER["REQUEST_METHOD"]){
			return self::editSubmit($id);
		}
		$task = Task::findById($id);
		return View::render("new", [
			"task" => $task
		]);
	}

	public static function done(int $id){
		$task = Task::findById($id);
		Database::delete($task);
		Router::redirectTo("list");
	}
}
