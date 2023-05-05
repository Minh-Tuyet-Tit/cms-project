@extends('layouts.layoutAdmin')

@section('main')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Update Image Galery</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="{{ url('admin/imagegalery/update/' . $slide->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>URL</label>
                                    <div class="image_product"></div>
                                    <input name="url" hidden id="images" type="text" class="form-control"
                                        value="{{ $slide->url }}" placeholder="Enter meta_description" />
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
                                    <input name="link" type="text" class="form-control" value="{{ $slide->link }}"
                                        placeholder="Enter link product" />

                                    @error('link')
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
                                    <label>Image Galery</label>
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
                            <a style="float: right" href="{{ url('admin/imagegalery') }}" class="btn btn-danger"
                                role="button">Cancel</a>
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
                    <h3 class="card-title">Image Galery</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 10px">id</th>
                                <th>Url</th>
                                <th>Link product</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $slide)
                                <tr>
                                    <td>{{ $slide->id }}</td>
                                    <td style="word-wrap:break-word; width: 20%; overflow: hidden;">{{ $slide->url }}
                                    </td>
                                    <td>
                                        <p>{{ $slide->link }}</p>
                                    </td>
                                    <td>
                                        {{ $status[array_search($slide->status, array_column($status->toArray(), 'id'))]->status_name }}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/imagegalery/update/' . $slide->id) }}" type="button"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/imagegalery/delete/' . $slide->id) }}" type="button"
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
