<?php

$app->get('/logout', function() use ($app) {

	unset($_SESSION[$app->config->get('auth.session')]);

	$app->flash('Salir', 'You has been logged out');
	$app->response->redirect($app->urlFor('home'));

})->name('logout');