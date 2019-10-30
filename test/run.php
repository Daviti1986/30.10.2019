<?php

namespace myapp;
use FastRoute\Dispatcher;
use myapp\dispatcher;
class run
{
	public function run()
	{
				// Fetch method and URI from somewhere
		$httpMethod = $_SERVER['REQUEST_METHOD'];
		$uri = $_SERVER['REQUEST_URI'];

		// Strip query string (?foo=bar) and decode URI
		if (false !== $pos = strpos($uri, '?')) {
		    $uri = substr($uri, 0, $pos);
		}
		$uri = rawurldecode($uri);

		$routeInfo = dispatcher::addroute->dispatch($httpMethod, $uri);
		switch ($routeInfo[0]) {
		    case Dispatcher::NOT_FOUND:
		        echo "not found";
		        break;
		    case Dispatcher::METHOD_NOT_ALLOWED:
		        $allowedMethods = $routeInfo[1];
		        echo "METHOD_NOT_ALLOWED";
		        break;
		    case Dispatcher::FOUND:
		        $handler = $routeInfo[1];
		        $vars = $routeInfo[2];
		        echo "okey";
		        break;
		}
	}
}