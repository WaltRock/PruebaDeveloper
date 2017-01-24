<?php

// Routes

$app->get('/', App\Action\HomeAction::class)
        ->setName('homepage');

$app->get('/detalles/{id}', App\Action\ModalAction::class)
        ->setName('modalpage');

$app->get('/employees/salary/{start}/{end}', App\Action\ServiceAction::class)
        ->setName('service');
