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
		return View::render("new", [
			"task" => new Task()
		]);
	}
	public static function newSubmit(){
		$task = new Task($_REQUEST);
		$task->insert();
		return Router::redirectTo("list");
	}

	public static function edit(int $id){
		$task = Task::findById($id);
		return View::render("new", [
			"task" => $task
		]);
	}
	public static function editSubmit(int $id){
		$task = Task::findById($id);
		$task->patch($_REQUEST);
		Database::save($task);
		return Router::redirectTo("list");
	}

	public static function done(int $id){
		$task = Task::findById($id);
		Database::delete($task);
		Router::redirectTo("list");
	}
}
