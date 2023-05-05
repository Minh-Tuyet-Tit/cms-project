@extends('layouts.layoutAdmin')

@section('main')
    <div class="col-md-12">




        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Add Post</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ url('admin/post/create') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Post title</label>
                                <input name="post_title" type="text" class="form-control"
                                    placeholder="Enter Post title" />
                                @error('post_title')
                                    <div class="alert alert-default-secondary" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Order</label>
                                <input name="order" type="number" class="form-control" placeholder="Enter Order" />
                                @error('order')
                                    <div class="alert alert-default-secondary" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>View count</label>
                                <input name="view_count" type="number" value="0" class="form-control"
                                    placeholder="Enter price product" />
                                @error('view_count')
                                    <div class="alert alert-default-secondary" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Summary</label>
                                <textarea name="summary" id="product-summary" placeholder="Enter Summary Product"></textarea>
                                @error('summary')
                                    <div class="alert alert-default-secondary" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="product-description" placeholder="Enter Description Product"></textarea>
                                @error('description')
                                    <div class="alert alert-default-secondary" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Meta keyword</label>
                                <input name="meta_keyword" type="text" class="form-control"
                                    placeholder="Enter meta_keyword" />
                                @error('meta_keyword')
                                    <div class="alert alert-default-secondary" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Meta description</label>
                                <input name="meta_description" type="text" class="form-control"
                                    placeholder="Enter meta_description" />
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
                                <label>Category</label>
                                <select name="cat_id" class="form-control">
                                    @foreach ($category as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date public</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="date" name="date_public" class="form-control datetimepicker-input"
                                        data-target="#reservationdate" />
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Image</label>
                                <div class="image_product"></div>
                                <input name="image" hidden id="images" type="text" class="form-control" />
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId"><i
                                        class="fas fa-folder-open"></i></button>
                                @error('images')
                                    <div class="alert alert-default-secondary" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>


                        </div>


                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-primary mt-3" role="button">Add</button>
                        <a style="float: right" href="{{ url('admin/post') }}" class="btn btn-dark mt-3"
                            role="button">Cancle</a>
                    </div>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>





    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title">sm</h5> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ url('filemanager/dialog.php?field_id=images') }}"
                        style="height: 300px; width:100%"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="list-img" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title">sm</h5> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ url('filemanager/dialog.php?field_id=list-images') }}"
                        style="height: 300px; width:100%"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection()
