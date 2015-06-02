<?php

$authenticationCheck = function($required) use ($app) {
	return function() use ($required, $app) {
		if ((!$app->auth && $required) || ($app->auth && !$required)) {
			$app->redirect($app->urlFor('home'));
		}
	};
};

$guest = function() use ($authenticationCheck) {
	return $authenticationCheck(false);
};

$authenticated = function() use ($authenticationCheck) {
	return $authenticationCheck(true);
};

$admin = function() use ($app) {

	return function() use ($app) {
		if (!$app->auth || !$app->auth->isAdmin()) {
			$app->redirect($app->urlFor('home'));
		}
	};
};
