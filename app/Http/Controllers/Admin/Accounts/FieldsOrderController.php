<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Field;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;


class FieldsOrderController extends AdminController
{

    public function index()
    {
        $items = Field::orderBy('list_order')->get();

        return $this->view('accounts.fields.order')->with('items', $items);
    }

    /**
     * Update the order
     * @param Request $request
     * @return array
     */
    public function update(Request $request)
    {
        $items = json_decode($request->get('list'), true);
        foreach ($items as $key => $item) {
            $field = Field::where("id",$item['id'])->first();
            $field->list_order = $key + 1;
            $field->save();
        }

        return ['result' => "success"];
    }
}
