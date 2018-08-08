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
			$task = new Task($_REQUEST);
			$task->insert();
			return Router::redirectTo("list");
		}
		return View::render("new", [
			"task" => new Task()
		]);
	}

	public static function edit(int $id){
		$task = Task::findById($id);
		if("POST" == $_SERVER["REQUEST_METHOD"]){
			$task->patch($_REQUEST);
			$task->update();
			return Router::redirectTo("list");
		}
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
