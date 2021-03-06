<?php

$app->get('/login', $guest(), function() use ($app) {

	$app->render('auth/login.php');

})->name('login');


$app->post('/login', $guest(), function() use ($app) {

	$request = $app->request;

	$identifier = $request->post('identifier');
	$password = $request->post('password');

	$v = $app->validation;

	$v->validate([
		'identifier' => [$identifier, 'required'],
		'password' => [$password, 'required']
	]);

	if ($v->passes()) {

		$_SESSION[$app->config->get('auth.session')] = 1;
	
		$app->flash('welcome', 'Bienvenido!');
		$app->response->redirect($app->urlFor('dashboard'));

	}

	$app->render('auth/login.php', [
		'errors' 	=> $v->errors(),
		'request'	=> $request
	]);	

})->name('login.post');