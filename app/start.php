<?php

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT . '/vendor/autoload.php';

$app = new Slim();

$app = new Slim([
	'mode'	=> file_get_contents(INC_ROOT . '/mode.php'),
	'view'	=> new Twig(),
	'templates.path' => INC_ROOT . '/app/views'
]);

require 'routes.php';

$view = $app->view();

$view->parseOptions = [
	'debug' => true
];

$view->parserExtensions = [
	new TwigExtension
];