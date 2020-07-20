<?php

namespace App\Http\Controllers\Admin;

use App\ServiceCategory;

use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Gate;

use Illuminate\Validation\Rule;

class ServiceCategoryController extends AdminController
{

    public function index()
    {
        save_resource_url();
        return $this->view('serviceCategory.index', [
            'categories' => ServiceCategory::get()
        ]);
    }


    public function create()
    {
        //
        if(Gate::denies('create-categories')){
            return redirect(route('service-categories.index'));
        }
        return $this->view('serviceCategory.create', [
            'category' => [],
            'categories' => ServiceCategory::with('children')->where("parent_id", 0)->get(),
            'delimiter' => ''
        ]);
    }


    public function store(Request $request)
    {
        $attributes = request()->validate(ServiceCategory::$rules, ServiceCategory::$messages);

        $category = $this->createEntry(ServiceCategory::class, $attributes);

        return redirect_to_resource();
    }


    public function show(ServiceCategory $expertsCategory)
    {
        //
    }


    public function edit(ServiceCategory $serviceCategory)
    {
        return $this->view('serviceCategory.edit', [
            'category' => $serviceCategory,
            'categories' => ServiceCategory::with('children')->where("parent_id", 0)->get(),
            'delimiter' => ''
        ]);
    }

    public function update(Request $request, ServiceCategory $serviceCategory)
    {

        $rules = ServiceCategory::$rules;
        $rules['slug'][1] = Rule::unique('service_categories')->ignore($serviceCategory->id); 

        $attributes = request()->validate($rules, ServiceCategory::$messages);

        $category = $this->updateEntry($serviceCategory, $attributes);

        return redirect_to_resource();
    }


    public function destroy(ServiceCategory $serviceCategory)
    {
        if(Gate::denies('delete-categories')){
            return redirect_to_resource();
        }
        $serviceCategory->services()->detach();
        $this->deleteEntry($serviceCategory, request());

        return redirect_to_resource();
    }
}
