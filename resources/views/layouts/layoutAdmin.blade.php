<?php
$menus = config('menu');

?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}" />

    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}" />

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}" />
    <style>
        .image-item {
            position: relative;
        }

        .image-item:hover .remove-image {
            opacity: 1;
        }

        .remove-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            cursor: pointer;
            transition: 0.2s linear;
        }
    </style>

    <script src="{{ asset('assets/ckeditor5/ckeditor.js') }}"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div> --}}

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="{{ url('/admin') }}" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('admin') }}" class="nav-link active">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('') }}" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="{{ url('/admin') }}" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" role="button" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/admin') }}" class="brand-link">
                <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                @if (isset(Auth::user()->name))
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                                alt="User Image" />
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                        </div>
                    </div>
                @endif



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul id="main-menu" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
                        role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        @foreach ($menus as $key => $menu)
                            <li class="nav-item main-nav ">
                                <a href="{{ url($menu['link']) }}"
                                    class="nav-link main-link {{ $request->is($menu['link']) ? 'active' : '' }} ">
                                    <i class="nav-icon {{ $menu['icon'] }}"></i>
                                    <p>
                                        {{ $menu['lable'] }}
                                        @if (isset($menu['items']))
                                            <i class="right fas fa-angle-left"></i>
                                        @endif
                                    </p>
                                </a>

                                @if (isset($menu['items']))
                                    <ul class="nav nav-treeview">

                                        @foreach ($menu['items'] as $item)
                                            <li class="nav-item">
                                                <a href="{{ url($item['link']) }}"
                                                    class="nav-link  {{ $request->is($item['link']) || $request->is($item['link'] . '/*') ? 'active' : '' }}  ">
                                                    <i class="{{ $item['icon'] }} nav-icon"></i>
                                                    <p>{{ $item['lable'] }}</p>
                                                </a>
                                            </li>


                                            @if ($request->is($item['link']) || $request->is($item['link'] . '/*'))
                                                <script>
                                                    var menu = document.querySelector('#main-menu')
                                                    var listItem = menu.querySelectorAll('.main-nav')
                                                    var mainLink = listItem[{{ $key }}].querySelector('.main-link')
                                                    listItem[{{ $key }}].classList.add('menu-open')
                                                    mainLink.classList.add('active')
                                                </script>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif


                            </li>
                        @endforeach


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            {{-- <h1 class="m-0">Starter Page</h1> --}}
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            {{-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                                <li class="breadcrumb-item active">{{ route('create') }}</li>
                            </ol> --}}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                @if (session('success'))
                   
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-success">
                                    <h1 class="">Success</h1>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center fa-2x">
                                    {{ session('success') }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('main')

                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside> --}}
        <!-- /.control-sidebar -->



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
                        <iframe src="{{ url('filemanager/dialog.php?field_id=list-images&type=0') }}"
                            style="height: 300px; width:100%"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">Anything you want</div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021
                <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#config'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#product-summary'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#product-description'))
            .catch(error => {
                console.error(error);
            });
    </script>



    <script>
        // product
        var inputImg = document.querySelector('#images');
        var showImg = document.querySelector('.image_product');
        showImg.innerHTML = `<img style="width:200px" src="${inputImg.value}" />`

        $('#modelId').on('hide.bs.modal', event => {
            var inputImg = document.querySelector('#images');
            var showImg = document.querySelector('.image_product');
            showImg.innerHTML = `<img style="width:200px" src="${inputImg.value}" />`

        });

        let listImage = [];
        var inputImg = document.querySelector('#list-images');
        var showImg = document.querySelector('.list-image-product');
        if (inputImg.value) {
            try {
                JSON.parse(inputImg.value);
                listImage = [...JSON.parse(inputImg.value), ...listImage];
            } catch (error) {
                listImage.push(inputImg.value)
            }
        }
        console.log(listImage);

        function render() {
            let html

            html = listImage.map((img, index) => {
                return `<div class="col-md-2 " >
                            <div class="image-item">
                                <img style="width:100%; margin-bottom:10px" src="${img}" />
                                <div class="remove-image" onclick=remove_image(${index})>
                                    <i class="fas fa-trash-alt"></i>
                                </div>
                            </div>
                        </div>`
            })
            showImg.innerHTML = html.join('');
        }

        function remove_image(index) {
            listImage.splice(index, 1);
            inputImg.value = JSON.stringify(listImage);
            render();

        }


        render();

        $('#list-img').on('hide.bs.modal', event => {
            var inputImg = document.querySelector('#list-images');
            var showImg = document.querySelector('.list-image-product');

            try {
                JSON.parse(inputImg.value);
                listImage = [...JSON.parse(inputImg.value)];
            } catch (error) {
                listImage.push(inputImg.value)
            }

            inputImg.value = JSON.stringify(listImage);


            render();

        });
    </script>

    <script>
        // Sử dụng JavaScript để hiển thị modal
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            // các tùy chọn modal ở đây
        });

        myModal.show();
    </script>

</body>

</html>
