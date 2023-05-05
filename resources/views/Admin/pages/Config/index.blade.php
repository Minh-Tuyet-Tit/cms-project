@extends('layouts.layoutAdmin')

@section('main')
    
    <div class="row">
        <div class="col-md-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Add Config</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="{{ url('admin/config/create') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="Enter name" />

                                    @error('name')
                                        <div class="alert alert-default-secondary" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input name="link" type="text" class="form-control" placeholder="Enter link" />

                                    @error('link')
                                        <div class="alert alert-default-secondary" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <input name="url" type="text" class="form-control" placeholder="Enter url" />

                                    @error('url')
                                        <div class="alert alert-default-secondary" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" id="config" rows="10" cols="80"></textarea>

                                    @error('content')
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
                                    <label>Position</label>
                                    <select name="position" class="form-control">

                                        @foreach ($position as $ps)
                                            <option value="{{ $ps->id }}">{{ $ps->name }}</option>
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
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Config</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 10px">id</th>
                                <th>name</th>
                                <th>content</th>
                                <th>Link</th>
                                <th>Url</th>
                                <th>position</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $dt)
                                <tr>
                                    <td>{{ $dt->id }}</td>
                                    <td>{{ $dt->name }}</td>
                                    <td>
                                        <?php echo $dt->content; ?>
                                    </td>
                                    <td>{{ $dt->link }}</td>
                                    <td>
                                        {{ $dt->url }}
                                    </td>
                                    <td>
                                        {{ $position[array_search($dt->position, array_column($position->toArray(), 'id'))]->name }}
                                    </td>
                                    <td>
                                        {{ $status[array_search($dt->status, array_column($status->toArray(), 'id'))]->status_name }}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/config/update/' . $dt->id) }}" type="button"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/config/delete/' . $dt->id) }}" type="button"
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
