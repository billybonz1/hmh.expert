<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Field;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Validation\Rule;

class FieldsController extends AdminController
{
    /**
     * Display a listing of client.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        save_resource_url();

        $items = Field::orderBy("list_order")->get();

        return $this->view('accounts.fields.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new client.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // $roles = Role::getAllLists();

        return $this->view('accounts.fields.create_edit');
    }

    /**
     * Store a newly created client in storage.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $attributes = request()->validate(Field::$rules, Field::$messages);


        $field = $this->createEntry(Field::class, $attributes);


        return redirect_to_resource();
    }

    /**
     * Display the specified client.
     *
     * @param User $client
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $client)
    {
        // return $this->view('accounts.clients.show')->with('item', $client);
    }

    /**
     * Show the form for editing the specified client.
     *
     * @param User $client
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Field $field)
    {
        return $this->view('accounts.fields.create_edit')
            ->with('item', $field);
    }

    /**
     * Update the specified client in storage.
     *
     * @param User $client
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Field $field)
    {

        $rules = Field::$rules;
        $rules['slug'] = [
            'required', 'string', 'max:190',
            Rule::unique('fields')->ignore($field->id)
        ];
        $attributes = request()->validate($rules, Field::$messages);


        $field = $this->updateEntry($field, $attributes);


        return redirect_to_resource();
    }

    /**
     * Remove the specified client from storage.
     *
     * @param User $client
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Field $field)
    {
        $this->deleteEntry($field, request());

        return redirect_to_resource();
    }
}
