<?php



namespace myapp;
use FastRoute\Dispatcher;
//use myapp\disp;
//use myapp\run;
class Database
{	
	protected static $instance = null;
	protected $dispatcher;
	private function __construct()
	{

	}
	public static function instance()
	{
		if (!isset(static::$instance)) {
			static::$instance=new static;
		}
		return static::$instance;
	}
	public function addroute()
	{
		$this->dispatcher =\FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $r) 
			{
		    	$r->addRoute('GET', '/', [\test\http\controllers\home::class, "index"]);
		    	$r->addRoute('GET', '/about', [\test\http\controllers\about::class, "about"]);
		    
			});
	}

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

		$routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);
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
		        call_user_func(array($handler[0], $handler[1]));
		        break;
		}
	}	


	
}