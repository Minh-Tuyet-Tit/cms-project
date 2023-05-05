@extends('layouts.layoutAdmin')

@section('main')
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Post</h3>
                <a style="float: right" class="btn btn-primary" href="{{ url('admin/post/create') }}" role="button">Add
                    post</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">id</th>
                            <th>Post title</th>
                            <th style="width:100px">Images</th>
                            <th>Category</th>
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


                        @foreach ($data as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->post_title }}</td>
                                <td><img style="width: 100%" src="{{ $post->image }}" alt="img"></td>
                                <td>
                                    {{ $category[array_search($post->catPro_id, array_column($category->toArray(), 'id'))]->cat_name }}
                                </td>
                                <td><?php echo $post->summary; ?></td>
                                <td><?php echo $post->description; ?></td>
                                <td>{{ $status[array_search($post->status, array_column($status->toArray(), 'id'))]->status_name }}
                                </td>
                                <td>{{ $post->order }}</td>
                                <td>{{ $post->user_id }}</td>
                                <td>{{ $post->date_public }}</td>
                                <td>{{ $post->view_count }}</td>
                                <td>
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ url('admin/post/update/' . $post->id) }}" type="button"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ url('admin/post/delete/' . $post->id) }}" type="button"
                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
