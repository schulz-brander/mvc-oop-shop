<?php

class Router
{
	private $routes;

	public function __construct()
	{
		$routesPath = ROOT . '/config/routes.php';
		$this->routes = include($routesPath);
	}

	/**
	* Возвращаем строку запроса (REQUEST_URI) 
	*/
	private function getURI() 
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
			return  $uri = trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run()
	{
		$uri = $this->getURI();
		
		foreach ($this->routes as $uriPatern => $path) {
			if (preg_match("~$uriPatern~", $uri)) {
				
				// Внутренний путь из внешнего, по правилам в routes.php
				$internalRoute = preg_replace("~^$uriPatern~", $path, $uri);
				$segments = explode('/', $internalRoute);	
				$controllerName = ucfirst(array_shift($segments)) . 'Controller';
				$actionName = 'action' . ucfirst(array_shift($segments));
				
				$parameters = $segments; // в массиве остались параметры, мы их передадим в контроллер

				$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
				
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}
				
				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				if ($result) {
					break;
				}
			}
		}
	}
}
?>