<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\ImageGalery;

use App\Models\Status;

class ImageGaleryController extends Controller
{
    public function index(Request $request)
    {

        $data = ImageGalery::all();
        $status = Status::all();

        return view('Admin.pages.ImageGalery.index', compact('request', 'data', 'status'));
    }

    public function create(Request $request)
    {

        $rules = [
            'url' => 'required|unique:images_galery|max:255',
            'link' => 'required|max:255',

        ];
        $message = [
            'url.required' => 'Please enter a url',
            'url.unique' => 'url already exists',
            'link.required' => 'Please enter link',
            'link.max' => 'link must be less than 255 characters',
        ];
        $request->validate($rules, $message);
        $newSlide = $request->all();

        ImageGalery::create($newSlide);
        return redirect(url('admin/imagegalery'))->with('success', 'Image Galery create successfully');
    }

    public function delete(Request $request, $id)
    {
        $slide = ImageGalery::findOrFail($id);

        $slide->delete();

        return redirect(url('admin/imagegalery'))->with('success', 'Image Galery delete successfully');
    }

    public function edit(Request $request, $id)
    {

        $status = Status::all();
        $slide = ImageGalery::findOrFail($id);

        $data = ImageGalery::all();


        return view('Admin.pages.ImageGalery.Update', compact('request', 'data', 'status', 'slide'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'url' => 'required|max:255',
            'link' => 'required|max:255',

        ];
        $message = [
            'url.required' => 'Please enter a url',
            'link_pro.required' => 'Please enter link_pro',
            'link_pro.max' => 'link_pro must be less than 255 characters',
        ];
        $request->validate($rules, $message);

        $newSlide = $request->all();

        $slide = ImageGalery::findOrFail($id);

        $slide->update($newSlide);

        return redirect(url('admin/imagegalery'))->with('success', 'Image Galery update successfully');
    }
}
