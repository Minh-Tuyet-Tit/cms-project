<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Position;
use App\Models\Status;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request){
        $status = Status::all();

        $data= Position::all();

        return view('Admin.pages.Position.index', compact('request', 'data', 'status'));
    }

    public function create(Request $request){

        $rules = [
            'name' => 'required|unique:positions|max:100',
        ];
        $message = [
            'name.required' => 'Please enter a position name',
            'name.unique' => 'Position name already exists',
        ];
        $request->validate($rules, $message);

        $newCate = $request->all();

        Position::create($newCate);

        

        return redirect(url('admin/position'))->with('success', 'Position create successfully');
    }


    public function delete(Request $request, $id){
        $cate = Position::findOrFail($id);

        $cate->delete();

        return redirect(url('admin/position'))->with('success', 'Position delete successfully');
    }


    public function edit(Request $request, $id){
        $file = Position::findOrFail($id);
        $status = Status::all();

        $data = Position::all();

        return view('Admin.pages.Position.Update', compact('request', 'data', 'status', 'file'));

        
    }

    public function update(Request $request, $id){

        $rules = [
            'name' => 'required|max:100',
        ];
        $message = [
            'name.required' => 'Please enter a position name',
           
        ];
        $request->validate($rules, $message);

        $newPo = $request->all();

        $file = Position::findOrFail($id);

        $file->update($newPo);

        return redirect(url('admin/position'))->with('success', 'Position update successfully');
    }
}
