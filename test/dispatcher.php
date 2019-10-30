<?php

namespace myapp;

class disp
{
	protected $dispatcher;
	public function addroute()
	{
		$this->dispatcher =\FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) 
			{
		    	$r->addRoute('GET', '/', [test\http\controllers\home::class, "index"]);
		    
			});
	}	
}

