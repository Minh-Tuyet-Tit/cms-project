@extends('layouts.layoutAdmin')

@section('main')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Update File Type</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="{{ url('admin/filetype/update/' . $file->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>File Extention</label>
                                    <input name="file_extention" type="text" class="form-control"
                                        value="{{ $file->file_extention }}" placeholder="Enter file_extention" />

                                    @error('file_extention')
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
                                    <label>File Type</label>
                                    <select name="status" class="form-control">

                                        @foreach ($status as $st)
                                            <option value="{{ $st->id }}">{{ $st->status_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button name="" id="" class="btn btn-primary" role="button">Update</button>
                            <a style="float: right" href="{{ url('admin/filetype') }}" class="btn btn-dark"
                                role="button">Cancel</a>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <!-- /.col -->
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">File Type</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">id</th>
                            <th>File Extention</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $file)
                            <tr>
                                <td>{{ $file->id }}</td>
                                <td>{{ $file->file_extention }}</td>
                                <td>
                                    {{ $status[array_search($file->status, array_column($status->toArray(), 'id'))]->status_name }}
                                </td>
                                <td style="width:10%">
                                    <a href="{{ url('admin/filetype/update/' . $file->id) }}" type="button"
                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                </td>
                                <td style="width:10%">
                                    <a href="{{ url('admin/filetype/delete/' . $file->id) }}" type="button"
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
