<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\CategoryProduct;

use App\Models\Status;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CategoryProductController extends Controller
{
    public function index(Request $request)
    {
        $data = CategoryProduct::all();
        return view('Admin.pages.CategoriesProduct.index', compact('request', 'data'));
    }

    public function add(Request $request)
    {

        $status = Status::all();

        return view('Admin.pages.categoriesProduct.Add', compact('request', 'status'));
    }

    public function create(Request $request)
    {
        $rules = [
            'cat_name' => 'required|unique:categories_product|max:100',
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

       
        CategoryProduct::create($newCate);

        return redirect('/admin/category-product')->with('success', 'catrgory product create successfully');
    }


    public function delete($id)
    {

        $cate = CategoryProduct::findOrFail($id);

        $cate->delete();
        return redirect('/admin/category-product')->with('success', 'catrgory product delete successfully');
    }

    public function edit(Request $request, $id)
    {
        $cate = CategoryProduct::findOrFail($id);
        $status = Status::all();

        return view('Admin.pages.CategoriesProduct.Update', compact('request', 'cate', 'status'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'cat_name' => 'required|max:100',
            'meta_keyword' => 'required|max:255',
            'meta_description' => 'required|max:255',
        ];
        $message = [
            'cat_name.required' => 'Please enter a category product name',
            'meta_keyword.required' => 'Please enter meta_keyword',
            'meta_keyword.max' => 'Meta_keyword must be less than 255 characters',
            'meta_description.required' => 'Please enter meta_description',
            'meta_description.max' => 'Meta_description must be less than 255 characters',
        ];
        $request->validate($rules, $message);

        $cate = CategoryProduct::findOrFail($id);

       

        $dataForm = $request->all();

        $cate->update($dataForm);
        return redirect('/admin/category-product')->with('success', 'catrgory product update successfully');
    }
}
