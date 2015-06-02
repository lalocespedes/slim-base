<?php

$app->get('/', function () use ($app) {
    
	$users = $app->user->where('active', true)->get();
   	 
	$app->render('/home/home.twig', [
		'name'	=> 'lalo'
	]);

})->name('home');