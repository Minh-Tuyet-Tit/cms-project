@extends('layouts.layoutAdmin')

@section('main')
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Products</h3>
                <a style="float: right" class="btn btn-primary" href="{{ url('admin/product/create') }}" role="button">Add
                    product</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">id</th>
                            <th>Name</th>
                            <th style="width:100px">Images</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Summary</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>User</th>
                            <th>Date public</th>
                            <th>View Count</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($data as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->pro_name }}</td>
                                <td><img style="width: 100%" src="{{ $product->images }}" alt="img"></td>
                                <td>
                                    {{ $category[array_search($product->catPro_id, array_column($category->toArray(), 'id'))]->cat_name }}
                                </td>
                                <td>{{ $product->price }}</td>
                                <td><?php echo $product->summary; ?></td>
                                <td><?php echo $product->description; ?></td>
                                <td>{{ $status[array_search($product->status, array_column($status->toArray(), 'id'))]->status_name }}
                                </td>
                                <td>{{ $product->order }}</td>
                                <td>{{ $product->user_id }}</td>
                                <td>{{ $product->date_public }}</td>
                                <td>{{ $product->view_count }}</td>
                                <td>
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{url('admin/product/update/'. $product->id)}}"  type="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('admin/product/delete/'. $product->id)}}" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item">
                        <a class="page-link" href="#">&laquo;</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.card -->


    </div>
@endsection()
