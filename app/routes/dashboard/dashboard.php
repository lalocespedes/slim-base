<?php

$app->get('/dashboard', $authenticated(), function() use ($app) {
    echo "dashboard";
});