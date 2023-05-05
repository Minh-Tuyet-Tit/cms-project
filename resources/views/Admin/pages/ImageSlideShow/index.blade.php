@extends('layouts.layoutAdmin')

@section('main')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Add Image Slide Show</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="{{ url('admin/imageslideshow/create') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>URL</label>
                                    <div class="image_product"></div>
                                    <input name="url" hidden id="images" type="text" class="form-control" />
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modelId"><i class="fas fa-folder-open"></i></button>
                                    @error('url')
                                        <div class="alert alert-default-secondary" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Link Product</label>
                                    <input name="link_pro" type="text" class="form-control"
                                        placeholder="Enter link product" />

                                    @error('link_pro')
                                        <div class="alert alert-default-secondary" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>Text header</label>
                                    <input name="text_head" type="text" class="form-control"
                                        placeholder="Enter text head" />

                                    @error('text head')
                                        <div class="alert alert-default-secondary" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>Text Content</label>
                                    <input name="text_content" type="text" class="form-control"
                                        placeholder="Enter text content" />

                                    @error('text_content')
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

                        <button name="" id="" class="btn btn-primary" role="button">Add</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <!-- /.col -->
        <div class="col-md-9">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Image Slide Show</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 10px">id</th>
                                <th>Url</th>
                                <th>Link product</th>
                                <th>Text head</th>
                                <th>Text content</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $slide)
                                <tr>
                                    <td>{{ $slide->id }}</td>
                                    <td><img style="width: 150px" src="{{ $slide->url }}" alt="img"></td>
                                    <td>
                                        <p>{{ $slide->link_pro }}</p>
                                    </td>
                                    <td>{{ $slide->text_head }}</td>
                                    <td>{{ $slide->text_content }}</td>
                                    <td>
                                        {{ $status[array_search($slide->status, array_column($status->toArray(), 'id'))]->status_name }}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/imageslideshow/update/' . $slide->id) }}" type="button"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/imageslideshow/delete/' . $slide->id) }}" type="button"
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
