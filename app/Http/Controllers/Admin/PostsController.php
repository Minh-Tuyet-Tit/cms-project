<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Posts;
use App\Models\Status;
use App\Models\CategoryPost;



class PostsController extends Controller
{
    public function index(Request $request)
    {

        $data = Posts::all();
        $status = Status::all();
        $category = CategoryPost::all();


        return view('Admin.pages.Posts.index', compact('request', 'data', 'status', 'category'));
    }



    public function add(Request $request)
    {
        $data = Posts::all();
        $status = Status::all();
        $category = CategoryPost::all();

        return view('Admin.pages.Posts.Add', compact('request', 'data', 'status', 'category'));
    }

    public function create(Request $request)
    {

        $rules = [
            'post_title' => 'required|unique:posts|max:255',
            'summary' => 'required',
            'description' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',

        ];
        $message = [
            'post_title.required' => 'Please enter a name product',
            'post_title.unique' => 'name already exists',
            'summary.required' => 'Please enter summary',
            'description.required' => 'Please enter description',
            'meta_keyword.required' => 'Please enter meta_keyword',
            'meta_description.required' => 'Please enter meta_description',

        ];
        $request->validate($rules, $message);
       
        Posts::create($request->all());


        return redirect(url('admin/post'))->with('success', 'Posts created successfully');
    }

    public function delete(Request $request, $id)
    {
        $post = Posts::findOrFail($id);

        $post->delete();
        return redirect(url('admin/post'))->with('success', 'Posts delete successfully');
    }

    public function edit(Request $request, $id)
    {

        $status = Status::all();
        $post = Posts::findOrFail($id);
        $category = CategoryPost::all();
        return view('Admin.pages.Posts.Update', compact('request', 'status', 'post', 'category'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'post_title' => 'required|max:255',
            'summary' => 'required',
            'description' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',

        ];
        $message = [
            'post_title.required' => 'Please enter a name product',
            'summary.required' => 'Please enter summary',
            'description.required' => 'Please enter description',
            'meta_keyword.required' => 'Please enter meta_keyword',
            'meta_description.required' => 'Please enter meta_description',

        ];
        $request->validate($rules, $message);
        
        $post = Posts::findOrFail($id);


       
        

        $post->update($request->all());

        return redirect(url('admin/post'))->with('success', 'Posts update successfully');
    }
}
