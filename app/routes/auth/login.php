<?php

use Carbon\Carbon;

$app->get('/login', $guest(), function() use ($app) {

	$app->render('auth/login.php');

})->name('login');


$app->post('/login', $guest(), function() use ($app) {

	echo "loged";

})->name('login.post');