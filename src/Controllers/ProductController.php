<?php 

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class ProductController extends BaseController
{
	public function index(Request $request, Response $response)
	{
		$product = new \App\Models\Products;

		$getAll = $product->getAll()->fetchAll();

		return $this->view->render($response, 'home.twig', ['data' => $getAll]);
	}

	public function buy(Request $request, Response $response)
	{
		
		$id = $request->getParam('buy');

		$product = new \App\Models\Products;

		$find = $product->find('id', $id)->fetch();
		$data['product'] = $find;

		$transaction_details = array(
		  'order_id' 	=> date('YmdHis').rand(10,99),
		  'gross_amount'=> $find['price'], // no decimal allowed for creditcard
		);

		$transaction = array(
  			'transaction_details' => $transaction_details,
  		);

  		$snapToken = \Veritrans_Snap::getSnapToken($transaction);
		$data['token'] = $snapToken;

  		return $this->view->render($response, 'pay.twig', ['data' => $data]);
	}
}