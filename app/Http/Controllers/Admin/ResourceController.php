<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Resource;

use App\Models\Status;

use App\Models\Posts;


class ResourceController extends Controller
{
    public function index(Request $request)
    {

        $data = Resource::all();
        $status = Status::all();
        $post = Posts::all();

        return view('Admin.pages.Resource.index', compact('request', 'data', 'status', 'post'));
    }

    public function create(Request $request)
    {

        $rules = [
            'url' => 'required|unique:resource|max:255',
        ];
        $message = [
            'url.required' => 'Please enter a url',
            'url.unique' => 'url already exists',
        ];
        $request->validate($rules, $message);

        Resource::create($request->all());
        return redirect(url('admin/resource'))->with('success', 'resource create successfully');
    }

    public function delete(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);

        $resource->delete();


        return redirect(url('admin/resource'))->with('success', 'resource delete successfully');
    }

    public function edit(Request $request, $id)
    {

        $status = Status::all();
        $resource = Resource::findOrFail($id);
        $post = Posts::all();

        $data = Resource::all();


        return view('Admin.pages.Resource.Update', compact('request', 'data', 'status', 'resource', 'post'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'url' => 'required|max:255',

        ];
        $message = [
            'url.required' => 'Please enter a url',
        ];
        $request->validate($rules, $message);

         

        $resource = Resource::findOrFail($id);

        $resource->update($request->all());

        return redirect(url('admin/resource'))->with('success', 'resource update successfully');
    }
}
