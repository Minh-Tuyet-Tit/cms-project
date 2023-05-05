<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ImagesSlideShow;

use App\Models\Status;

use Illuminate\Http\Request;

class ImagesSlideShowController extends Controller
{
    public function index(Request $request)
    {

        $data = ImagesSlideShow::all();
        $status = Status::all();

        return view('Admin.pages.ImageSlideShow.index', compact('request', 'data', 'status'));
    }

    public function create(Request $request)
    {

        $rules = [
            'url' => 'required|unique:images_slideshow|max:255',
            'link_pro' => 'required|max:255',
            'text_head' => 'required|max:255',
            'text_content' => 'required|max:255',

        ];
        $message = [
            'url.required' => 'Please enter a url',
            'url.unique' => 'url already exists',
            'link_pro.required' => 'Please enter link_pro',
            'link_pro.max' => 'link_pro must be less than 255 characters',
            'text_head.required' => 'Please enter text_head',
            'text_head.max' => 'text_headn must be less than 255 characters',
            'text_content.required' => 'Please enter text_content',
            'text_content.max' => 'text_content must be less than 255 characters',
        ];
        $request->validate($rules, $message);
        $newSlide = $request->all();

        ImagesSlideShow::create($newSlide);
        return redirect(url('admin/imageslideshow'))->with('success', 'Image Slide Show create successfully');
    }

    public function delete(Request $request, $id)
    {
        $slide = ImagesSlideShow::findOrFail($id);

        $slide->delete();

        return redirect(url('admin/imageslideshow'))->with('success', 'Image Slide Show delete successfully');
    }

    public function edit(Request $request, $id)
    {

        $status = Status::all();
        $slide = ImagesSlideShow::findOrFail($id);

        $data = ImagesSlideShow::all();


        return view('Admin.pages.ImageSlideShow.Update', compact('request', 'data', 'status', 'slide'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'url' => 'required|max:255',
            'link_pro' => 'required|max:255',
            'text_head' => 'required|max:255',
            'text_content' => 'required|max:255',

        ];
        $message = [
            'url.required' => 'Please enter a url',
            'link_pro.required' => 'Please enter link_pro',
            'link_pro.max' => 'link_pro must be less than 255 characters',
            'text_head.required' => 'Please enter text_head',
            'text_head.max' => 'text_headn must be less than 255 characters',
            'text_content.required' => 'Please enter text_content',
            'text_content.max' => 'text_content must be less than 255 characters',
        ];
        $request->validate($rules, $message);

        $newSlide = $request->all();

        $slide = ImagesSlideShow::findOrFail($id);

        $slide->update($newSlide);

        return redirect(url('admin/imageslideshow'))->with('success', 'Image Slide Show update successfully');
    }
}
