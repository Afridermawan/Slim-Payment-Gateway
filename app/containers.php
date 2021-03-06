<?php

use Slim\Container;
use Slim\Views\Twig as View;
use Slim\Views\TwigExtension as ViewExt;

$container = $app->getContainer();

$container['db'] = function (Container $container) {
	$setting = $container->get('settings');

	$config = new \Doctrine\DBAL\Configuration();

	$connect = \Doctrine\DBAL\DriverManager::getConnection($setting['db'],
		$config);

	return $connect;
};

$container['view'] = function (Container $container) {
	$setting = $container->get('settings')['view'];

	$view = new View($setting['path'], $setting['twig']);
	$view->addExtension(new ViewExt($container->router, $container->request->getUri()));

	$view->getEnvironment()->addGlobal('flash', $container->flash);

	return $view;
};

$container['flash'] = function (Container $container) {
	return new \Slim\Flash\Messages;
};

Veritrans_Config::$serverKey = 'VT-server-iqakMraboh1_d3iyStCmBNCS';