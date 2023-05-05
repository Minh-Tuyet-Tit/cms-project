@extends('layouts.layoutAdmin')

@section('main')

    <div class="row">
        <div class="col-md-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Update Status</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="{{ url('admin/status/update/' . $status->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="status_name" type="text" class="form-control"
                                        value="{{ $status->status_name }}" placeholder="Enter Name Status" />

                                    @error('status_name')
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
                                    <select name="stastus" class="form-control" value="{{$status->stastus}}">
                                        <option value="{{$status->stastus}}">{{$status->stastus==1? 'Show': 'Hidden'}}</option>
                                        <option value="{{$status->stastus==1 ? 0 : 1}}">{{$status->stastus==1 ? 'Hidden' : 'Show'}}</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex mt-2 " style="width:100%; justify-content: space-between"> 
                            <button name="" id="" class="btn btn-primary" role="button">Update</button>
                            <a href="{{url('admin/status')}}" class="btn btn-danger" role="button">Cancel</a>
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
                    <h3 class="card-title">Status</h3>
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

                            @foreach ($data as $status)
                                <tr>
                                    <td>{{ $status->id }}</td>
                                    <td>{{ $status->status_name }}</td>
                                    <td>
                                        {{ $status->stastus == 1 ? 'Show' : 'Hidden' }}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/status/edit/' . $status->id) }}" type="button"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/status/delete/' . $status->id) }}" type="button"
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
