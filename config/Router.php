<?php

$app = new \Config\Routeparams();

$app->router->get('/', 'Home@index');

// Controllers
$app->router->get('/users', 'Users@index');

//Rutas para mantenimiento de zonas
$app->router->get('/zones', 'Zones@getAll');
$app->router->get('/zones/:id', 'Zones@getById');
$app->router->post('/zones', 'Zones@create');
$app->router->put('/zones/:id', 'Zones@update');
$app->router->delete('/zones/:id', 'Zones@delete');

$app->router->get('/about', function () {
    return 'About Page';
});

$app->run();



