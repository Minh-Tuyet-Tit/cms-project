<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\FileType;

use App\Models\Status;

class FileTypeController extends Controller
{
    public function index(Request $request)
    {

        $status = Status::all();
        $data = FileType::all();
        return view('Admin.pages.FileType.index', compact('request', 'data', 'status'));
    }

    public function create(Request $request)
    {


        $rules = [
            'file_extention' => 'required|unique:file_types|max:100',
        ];
        $message = [
            'file_extention.required' => 'Please enter a extention name',
            'file_extention.unique' => 'extention name already exists',
        ];
        $request->validate($rules, $message);

        $newFile = $request->all();

        FileType::create($newFile);


        return redirect(url('admin/filetype'))->with('success', 'File type create successfully');
    }


    public function delete(Request $request, $id)
    {
        $file = FileType::findOrFail($id);

        $file->delete();
        return redirect(url('admin/filetype'))->with('success', 'File type delete successfully');
    }

    public function edit(Request $request, $id)
    {

        $status = Status::all();
        $file = FileType::findOrFail($id);

        $data = FileType::all();



        return view('Admin.pages.FileType.Update', compact('request', 'data', 'file', 'status'));
    }

    public function update(Request $request, $id)
    {




        $rules = [
            'file_extention' => 'required|max:100',
        ];
        $message = [
            'file_extention.required' => 'Please enter a extention name',
        ];
        $request->validate($rules, $message);
        $file = FileType::findOrFail($id);

        $newFile = $request->all();

        $file->update($newFile);

        return redirect(url('admin/filetype'))->with('success', 'File type update successfully');
    }
}
