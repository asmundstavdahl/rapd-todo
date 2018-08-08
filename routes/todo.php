<?php

use \Rapd\Router;
use \Rapd\Router\Route;

Router::add(new Route("list",
	"/",
	[TodoController::class, "list"]
));

Router::add(new Route("new",
	"/new",
	[TodoController::class, "new"]
));

Router::add(new Route("edit",
	"/(\d+)",
	[TodoController::class, "edit"]
));

Router::add(new Route("done",
	"/(\d+)/done",
	[TodoController::class, "done"]
));
