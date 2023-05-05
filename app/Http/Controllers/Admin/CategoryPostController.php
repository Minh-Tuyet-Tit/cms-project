<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\CategoryPost;
use App\Models\Status;

class CategoryPostController extends Controller
{

    public function index(Request $request)
    {

        $data = CategoryPost::all();
        $status = Status::all();

        return view('Admin.pages.CategoriesPost.index', compact('data', 'request', 'status'));
    }


    public function create(Request $request)
    {
        $rules = [
            'cat_name' => 'required|unique:category_post|max:100',
            'meta_keyword' => 'required|max:255',
            'meta_description' => 'required|max:255',
        ];
        $message = [
            'cat_name.required' => 'Please enter a category product name',
            'cat_name.unique' => 'Category name already exists',
            'meta_keyword.required' => 'Please enter meta_keyword',
            'meta_keyword.max' => 'Meta_keyword must be less than 255 characters',
            'meta_description.required' => 'Please enter meta_description',
            'meta_description.max' => 'Meta_description must be less than 255 characters',
        ];
        $request->validate($rules, $message);

        $newCate = $request->all();

        CategoryPost::create($newCate);

        return redirect(url('admin/category-post'))->with('success', 'catrgory post create successfully');

    }

    public function delete(Request $request, $id){

        $cate = CategoryPost::findOrFail($id);

        $cate->delete();

        return redirect(url('admin/category-post'))->with('success', 'catrgory product delete successfully');
    }


    public function edit(Request $request, $id){
        $status = Status::all();
        $cate = CategoryPost::findOrFail($id);
        $data = CategoryPost::all();
        return view('Admin.pages.CategoriesPost.Update', compact('request', 'cate', 'status', 'data'));
    }


    public function update(Request $request, $id){

        $rules = [
            'cat_name' => 'required|max:100',
            'meta_keyword' => 'required|max:255',
            'meta_description' => 'required|max:255',
        ];
        $message = [
            'cat_name.required' => 'Please enter a categorypost name',
            'meta_keyword.required' => 'Please enter meta_keyword',
            'meta_keyword.max' => 'Meta_keyword must be less than 255 characters',
            'meta_description.required' => 'Please enter meta_description',
            'meta_description.max' => 'Meta_description must be less than 255 characters',
        ];
        $request->validate($rules, $message);

        $newCate = $request->all();

        $cate = CategoryPost::findOrFail($id);

        $cate->update($newCate);


        return redirect(url('admin/category-post'))->with('success', 'catrgory product update successfully');
    }


}
