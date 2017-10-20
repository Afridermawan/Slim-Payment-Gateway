<?php

$app->get('/', 'App\Controllers\ProductController:index')->setName('home');

$app->post('/buy', 'App\Controllers\ProductController:buy')->setName('buy');

$app->post('/payment/notification', 'App\Controllers\PaymentController:notification')->setName('payment.notification');