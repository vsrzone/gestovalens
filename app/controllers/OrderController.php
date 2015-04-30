<?php

class OrderController extends BaseController{

	public function __construct(){
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function postCheckout(){
		Session::put('order_details', Input::get('order_details'));
		return View::make('cart.checkout');
	}
}