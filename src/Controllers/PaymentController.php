<?php 

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class PaymentController extends BaseController
{
	public function notification(Request $request, Response $response)
	{
		$notif = new \App\Extension\Payments\PaymentHandler;
		$result = $notif->handler();

		if ($result['status'] == 200) {
			return $response->withJson('success');
		}
	}
}