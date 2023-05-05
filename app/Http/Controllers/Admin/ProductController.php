<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Status;

use App\Models\ImageProduct;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $data = Product::all();
        $status = Status::all();
        $category = CategoryProduct::all();


        return view('Admin.pages.Product.index', compact('request', 'data', 'status', 'category'));
    }



    public function add(Request $request)
    {
        $data = Product::all();
        $status = Status::all();
        $category = CategoryProduct::all();

        return view('Admin.pages.Product.Add', compact('request', 'data', 'status', 'category'));
    }

    public function create(Request $request)
    {

        $rules = [
            'pro_name' => 'required|unique:product|max:255',
            'summary' => 'required',
            'description' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',

        ];
        $message = [
            'pro_name.required' => 'Please enter a name product',
            'pro_name.unique' => 'name already exists',
            'summary.required' => 'Please enter summary',
            'description.required' => 'Please enter description',
            'meta_keyword.required' => 'Please enter meta_keyword',
            'meta_description.required' => 'Please enter meta_description',

        ];
        $request->validate($rules, $message);
        $newProduct = [
            'pro_name' => $request->pro_name,
            'images' => $request->images,
            'summary' => $request->summary,
            'description' => $request->description,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'price' => $request->price,
            'view_count' => $request->view_count,
            'status' => $request->status,
            'order' => $request->order,
            'date_public' => $request->date_public,
            'catPro_id' => $request->catPro_id,
            'user_id'
        ];
        $resul = Product::create($newProduct);

        $id = $resul->id;

        $listImage = json_decode($request->list_images, true);

        foreach ($listImage as $image) {
            $newImage = [
                'pro_id' => $id,
                'url' => $image,
            ];

            ImageProduct::create($newImage);
        }

        return redirect(url('admin/product'))->with('success', 'Product created successfully');
    }

    public function delete(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
        $list_image = ImageProduct::where('pro_id', $id)->get();
        foreach ($list_image as $image) {
            $image->delete();
        }
        return redirect(url('admin/product'))->with('success', 'Product delete successfully');
    }

    public function edit(Request $request, $id)
    {

        $status = Status::all();
        $product = Product::findOrFail($id);
        $category = CategoryProduct::all();
        $list_image = ImageProduct::where('pro_id', $id)->get();
        $links = array();

        foreach ($list_image as $image) {
            array_push($links, $image->url);
        }



        return view('Admin.pages.Product.Update', compact('request', 'status', 'product', 'category', 'links'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'pro_name' => 'required|max:255',
            'summary' => 'required',
            'description' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',

        ];
        $message = [
            'pro_name.required' => 'Please enter a name product',
            'summary.required' => 'Please enter summary',
            'description.required' => 'Please enter description',
            'meta_keyword.required' => 'Please enter meta_keyword',
            'meta_description.required' => 'Please enter meta_description',

        ];
        $request->validate($rules, $message);
        $newProduct = [
            'pro_name' => $request->pro_name,
            'images' => $request->images,
            'summary' => $request->summary,
            'description' => $request->description,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'price' => $request->price,
            'view_count' => $request->view_count,
            'status' => $request->status,
            'order' => $request->order,
            'date_public' => $request->date_public,
            'catPro_id' => $request->catPro_id,
            'user_id'
        ];

        $product = Product::findOrFail($id);


        // delete list_image
        $list_image = ImageProduct::where('pro_id', $id)->get();

        foreach ($list_image as $image) {
            $image->delete();
        }


        // update list_img
        $listImage = json_decode($request->list_images, true);

        foreach ($listImage as $image) {
            $newImage = [
                'pro_id' => $id,
                'url' => $image,
            ];

            ImageProduct::create($newImage);
        }

        $product->update($newProduct);

        return redirect(url('admin/product'))->with('success', 'Product update successfully');
    }
}
