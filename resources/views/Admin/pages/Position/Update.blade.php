@extends('layouts.layoutAdmin')

@section('main')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Update Position</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="{{ url('admin/position/update/'. $file->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" type="text" class="form-control"
                                    value="{{$file->name}}"
                                        placeholder="Enter Name Position" />

                                    @error('name')
                                        <div class="alert alert-default-secondary" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">

                                        @foreach ($status as $st)
                                            <option value="{{ $st->id }}">{{ $st->status_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button name="" id="" class="btn btn-primary" role="button">Add</button>
                            <a style="float: right" href="{{url('admin/position')}}" class="btn btn-dark" role="button">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <!-- /.col -->
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Position</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">id</th>
                                <th>Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $po)
                                <tr>
                                    <td>{{ $po->id }}</td>
                                    <td>{{ $po->name }}</td>
                                    <td>
                                        {{$status[array_search($po->status, array_column($status->toArray(),'id'))]->status_name}}
                                    </td>
                                    <td style="width:10%">
                                        <a href="{{ url('admin/position/update/' . $po->id) }}" type="button"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td style="width:10%">
                                        <a href="{{ url('admin/position/delete/' . $po->id) }}" type="button"
                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection()
