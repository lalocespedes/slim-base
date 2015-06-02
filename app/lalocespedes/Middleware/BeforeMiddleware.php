<?php

namespace lalocespedes\Middleware;

use Slim\Middleware;

/**
* 
*/
class BeforeMiddleware extends Middleware
{
	public function call()
	{
		
		$this->app->hook('slim.before', [$this, 'run']);

		$this->next->call();

	}

	public function run()
	{
		if (isset($_SESSION[$this->app->config->get('auth.session')])) {
			$this->app->auth = true;
		}
	}

}