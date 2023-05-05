@extends('layouts.layoutAdmin')

@section('main')
    <div class="row">


        <!-- /.col -->
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Categories Product</h3>
                    <a href="{{ url('admin/category-product/add') }}" style="float: right" type="button"
                        class="btn btn-primary">Add Category</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th style="width: 10px">id</th>
                                <th>Name</th>
                                <th style="width:150px">Images</th>
                                <th>Status</th>
                                <th>Meta Keyword</th>
                                <th>Meta Description</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $cate)
                                <tr>
                                    <td>{{ $cate->id }}</td>
                                    <td>{{ $cate->cat_name }}</td>
                                    <td>
                                        <img style="width:100%" src="{{$cate->images}}"
                                            alt="img">
                                    </td>
                                    <td>{{ $cate->status }}</td>
                                    <td>{{ $cate->meta_keyword }}</td>
                                    <td>{{ $cate->meta_description }}</td>
                                    <td>
                                        <a href="{{ url('admin/category-product/update/' . $cate->id) }}" type="button"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/category-product/delete/' . $cate->id) }}" type="button"
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
