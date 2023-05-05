@extends('layouts.layoutAdmin')

@section('main')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Update Resource</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="{{ url('admin/resource/update/'. $resource->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Url</label>
                                    <input name="url" type="text" class="form-control" placeholder="Enter URL"
                                    value="{{$resource->url}}"
                                    />

                                    @error('url')
                                        <div class="alert alert-default-secondary" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>File type</label>
                                    <input name="file_type" type="number" class="form-control" placeholder="Enter file_type" 
                                    value="{{$resource->file_type}}"
                                    />

                                    @error('file_type')
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
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Post</label>
                                    <select name="post_id" class="form-control">

                                        @foreach ($post as $ps)
                                            <option value="{{ $ps->id }}">{{ $ps->post_title }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <button name="" id="" class="btn btn-primary" role="button">Update</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <!-- /.col -->
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Resource</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 10px">id</th>
                                <th>Url</th>
                                <th>File type</th>
                                <th>Post</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $dt)
                                <tr>
                                    <td>{{ $dt->id }}</td>
                                    <td>{{ $dt->url }}</td>
                                    <td>{{ $dt->file_type }}</td>
                                    <td>
                                        {{ $post[array_search($dt->post_id, array_column($post->toArray(), 'id'))]->post_title }}
                                    </td>
                                    <td>
                                        {{ $status[array_search($dt->status, array_column($status->toArray(), 'id'))]->status_name }}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/resource/update/' . $dt->id) }}" type="button"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/resource/delete/' . $dt->id) }}" type="button"
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
