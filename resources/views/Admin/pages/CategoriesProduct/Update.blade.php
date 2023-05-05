@extends('layouts.layoutAdmin')

@section('main')
    <div class="card card-warning col-md-8  m-auto">
        <div class="card-header">
            <h3 class="card-title">Add Category Product </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="POST" action="{{ url('admin/category-product/update/' . $cate->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name</label>
                            <input name="cat_name" type="text" class="form-control" value="{{ $cate->cat_name }}"
                                placeholder="Enter name categoty product" />
                            @error('cat_name')
                                <div class="alert alert-default-secondary" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <input name="meta_keyword" type="text" class="form-control" value="{{ $cate->meta_keyword }}"
                                placeholder="Enter Meta Keyword" />
                            @error('meta_keyword')
                                <div class="alert alert-default-secondary" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Meta Description</label>
                            <input name="meta_description" type="text" class="form-control"
                                value="{{ $cate->meta_description }}" placeholder="Enter Meta Description" />
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
                                {{-- <option value="{{ $cate->status }}">{{ $st->status_name }}</option> --}}
                                @foreach ($status as $st)
                                    <option value="{{ $st->id }}">{{ $st->status_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <div class="image_product"></div>
                    <input name="images" hidden id="images" type="text" class="form-control"
                        value="{{ $cate->images }}" placeholder="Enter meta_description" />
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId"><i
                            class="fas fa-folder-open"></i></button>
                    @error('images')
                        <div class="alert alert-default-secondary" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div style="display: flex; justify-content: space-between">
                    <button class="btn btn-primary" href="#" role="button">Update</button>
                    <a href="{{ url('admin/category-product') }}" class="btn btn-primary" href="#"
                        role="button">Cancle</a>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>

    <script>
        document.getElementById("inputFile").onchange = function(e) {
            var reader = new FileReader();
            reader.onload = function() {
                var img = new Image();
                img.src = reader.result;
                img.style.width = "200px"
                document.getElementById("inputRender").innerHTML = '';
                document.getElementById("inputRender").appendChild(img);
            }
            reader.readAsDataURL(e.target.files[0]);
        };
    </script>
@endsection()
