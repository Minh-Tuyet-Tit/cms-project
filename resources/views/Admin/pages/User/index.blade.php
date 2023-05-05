@extends('layouts.layoutAdmin')

@section('main')
    
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th style="width: 10px">id</th>
                                <th>Name</th>
                                <th>Email</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    
                                    
                                    
                                    <td>
                                        <a href="{{ url('admin/user/delete/' . $user->id) }}" type="button"
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
