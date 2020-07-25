<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\ServiceOrder;

class PayController extends AdminController
{
	public function index(){
		return $this->view("pay.index")->with([
			'orders' => ServiceOrder::paginate(15)
		]);
	}
}