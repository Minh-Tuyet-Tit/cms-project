@extends('layouts.layoutAdmin')

@section('main')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Update Category post</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="{{ url('admin/category-post/update/' . $cate->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="cat_name" type="text" class="form-control" value="{{ $cate->cat_name }}"
                                        placeholder="Enter Name Category Post" />

                                    @error('cat_name')
                                        <div class="alert alert-default-secondary" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>Meta Keyword</label>
                                    <input name="meta_keyword" type="text" class="form-control"
                                        value="{{ $cate->meta_keyword }}" placeholder="Enter meta_keyword" />

                                    @error('meta_keyword')
                                        <div class="alert alert-default-secondary" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <input name="meta_description" type="text" class="form-control"
                                        value="{{ $cate->meta_description }}" placeholder="Enter meta_description" />

                                    @error('meta_description')
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

                            <button name="" id="" class="btn btn-primary" role="button">Update</button>
                            <a style="float: right" href="{{url('admin/category-post')}}" class="btn btn-dark" role="button">Cancle</a>
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

                            @foreach ($data as $cate)
                                <tr>
                                    <td>{{ $cate->id }}</td>
                                    <td>{{ $cate->cat_name }}</td>
                                    <td>
                                        {{ $status[array_search($cate->status, array_column($status->toArray(), 'id'))]->status_name }}
                                    </td>
                                    <td style="width:10%">
                                        <a href="{{ url('admin/category-post/update/' . $cate->id) }}" type="button"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td style="width:10%">
                                        <a href="{{ url('admin/categoory-post/delete/' . $cate->id) }}" type="button"
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
