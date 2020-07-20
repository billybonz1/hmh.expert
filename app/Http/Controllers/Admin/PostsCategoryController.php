<?php

namespace App\Http\Controllers\Admin;


use App\Models\PostsCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Gate;

class PostsCategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        save_resource_url();
        return $this->view('postsCategory.index', [
            'categories' => PostsCategory::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-posts-categories')){
            return redirect(route('posts-categories.index'));
        }
        return $this->view('postsCategory.create', [
            'category' => [],
            'categories' => PostsCategory::where("parent_id", 0)->get(),
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
        $attributes = request()->validate(PostsCategory::$rules, PostsCategory::$messages);

        $category = $this->createEntry(PostsCategory::class, $attributes);

        return redirect_to_resource();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->view('postsCategory.edit', [
            'category' => PostsCategory::where("id", $id)->first(),
            'categories' => PostsCategory::with('children')->where("parent_id", 0)->get(),
            'delimiter' => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostsCategory $postsCategory)
    {
        $attributes = request()->validate(PostsCategory::$rules, PostsCategory::$messages);

        $category = $this->updateEntry($postsCategory, $attributes);

        return redirect_to_resource();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostsCategory $postsCategory)
    {
        if(Gate::denies('delete-categories')){
            return redirect_to_resource();
        }
        $postsCategory->posts()->detach();
        $this->deleteEntry($postsCategory, request());
        
        return redirect_to_resource();
    }
}
