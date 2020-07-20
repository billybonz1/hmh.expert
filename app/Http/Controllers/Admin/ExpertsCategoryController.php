<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExpertsCategory;

use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Gate;

use Illuminate\Validation\Rule;

class ExpertsCategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        save_resource_url();
        return $this->view('expertsCategory.index', [
            'categories' => ExpertsCategory::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Gate::denies('create-categories')){
            return redirect(route('experts-categories.index'));
        }
        return $this->view('expertsCategory.create', [
            'category' => [],
            'categories' => ExpertsCategory::with('children')->where("parent_id", 0)->get(),
            'delimiter' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate(ExpertsCategory::$rules, ExpertsCategory::$messages);

        $category = $this->createEntry(ExpertsCategory::class, $attributes);

        return redirect_to_resource();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpertsCategory  $expertsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ExpertsCategory $expertsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpertsCategory  $expertsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpertsCategory $expertsCategory)
    {
        return $this->view('expertsCategory.edit', [
            'category' => $expertsCategory,
            'categories' => ExpertsCategory::with('children')->where("parent_id", 0)->get(),
            'delimiter' => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpertsCategory  $expertsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpertsCategory $expertsCategory)
    {
        $rules = ExpertsCategory::$rules;
        $rules['slug'][1] = Rule::unique('experts_categories')->ignore($expertsCategory->id); 
        
        $attributes = request()->validate($rules, ExpertsCategory::$messages);

        $category = $this->updateEntry($expertsCategory, $attributes);

        return redirect_to_resource();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpertsCategory  $expertsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpertsCategory $expertsCategory)
    {
        if(Gate::denies('delete-categories')){
            return redirect_to_resource();
        }
        $expertsCategory->users()->detach();
        $this->deleteEntry($expertsCategory, request());
        
        return redirect_to_resource();
    }
}
