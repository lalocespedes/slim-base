<?php

$app->get('/', function () use ($app) {
    
	$app->render('/home/home.twig', [
		'name'	=> 'lalo'
	]);

});