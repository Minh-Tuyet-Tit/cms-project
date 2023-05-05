<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;


Route::get('/', function (Request $request) {

    if (Auth::user()) {
       return redirect('admin');
    }
    return view('home' , compact('request'));
});




Route::prefix('admin')->middleware('auth')->group(function () {

    // dashboard
    Route::get('/', function (Request $request) {

        return view('Admin.pages.Home', compact('request'));
    })->name('home.index');


    // categories product

    Route::get('/category-product', [App\Http\Controllers\Admin\CategoryProductController::class, 'index']);
    Route::get('/category-product/add', [App\Http\Controllers\Admin\CategoryProductController::class, 'add'])->name('add');
    Route::post('/category-product/add', [App\Http\Controllers\Admin\CategoryProductController::class, 'create'])->name('create');
    Route::get('/category-product/delete/{id}', [App\Http\Controllers\Admin\CategoryProductController::class, 'delete'])->name('delete');
    Route::get('/category-product/update/{id}', [App\Http\Controllers\Admin\CategoryProductController::class, 'edit'])->name('edit');
    Route::post('/category-product/update/{id}', [App\Http\Controllers\Admin\CategoryProductController::class, 'update'])->name('update');


    // status
    Route::get('/status', [App\Http\Controllers\Admin\StatusController::class, 'index']);
    Route::post('/status/add', [App\Http\Controllers\Admin\StatusController::class, 'add'])->name('add');
    Route::get('/status/delete/{id}', [App\Http\Controllers\Admin\StatusController::class, 'delete'])->name('delete');
    Route::get('/status/edit/{id}', [App\Http\Controllers\Admin\StatusController::class, 'edit'])->name('edit');
    Route::post('/status/update/{id}', [App\Http\Controllers\Admin\StatusController::class, 'update'])->name('update');


    // categories post
    Route::get('/category-post', [App\Http\Controllers\Admin\CategoryPostController::class, 'index']);
    Route::get('/category-post/create', [App\Http\Controllers\Admin\CategoryPostController::class, 'add'])->name('add');
    Route::post('/category-post/create', [App\Http\Controllers\Admin\CategoryPostController::class, 'create'])->name('create');
    Route::get('/category-post/delete/{id}', [App\Http\Controllers\Admin\CategoryPostController::class, 'delete'])->name('delete');
    Route::get('/category-post/update/{id}', [App\Http\Controllers\Admin\CategoryPostController::class, 'edit'])->name('edit');
    Route::post('/category-post/update/{id}', [App\Http\Controllers\Admin\CategoryPostController::class, 'update'])->name('update');


    // position

    Route::get('/position', [App\Http\Controllers\Admin\PositionController::class, 'index']);
    Route::post('/position/create', [App\Http\Controllers\Admin\PositionController::class, 'create'])->name('create');
    Route::get('/position/delete/{id}', [App\Http\Controllers\Admin\PositionController::class, 'delete'])->name('delete');
    Route::get('/position/update/{id}', [App\Http\Controllers\Admin\PositionController::class, 'edit'])->name('edit');
    Route::post('/position/update/{id}', [App\Http\Controllers\Admin\PositionController::class, 'update'])->name('update');


    // file type

    Route::get('/filetype', [App\Http\Controllers\Admin\FileTypeController::class, 'index']);
    Route::post('/filetype/create/', [App\Http\Controllers\Admin\FileTypeController::class, 'create'])->name('create');
    Route::get('/filetype/delete/{id}', [App\Http\Controllers\Admin\FileTypeController::class, 'delete'])->name('delete');
    Route::get('/filetype/update/{id}', [App\Http\Controllers\Admin\FileTypeController::class, 'edit'])->name('edit');
    Route::post('/filetype/update/{id}', [App\Http\Controllers\Admin\FileTypeController::class, 'update'])->name('update');


    // image slide show
    Route::get('/imageslideshow', [App\Http\Controllers\Admin\ImagesSlideShowController::class, 'index']);
    Route::post('/imageslideshow/create', [App\Http\Controllers\Admin\ImagesSlideShowController::class, 'create'])->name('create');
    Route::get('/imageslideshow/delete/{id}', [App\Http\Controllers\Admin\ImagesSlideShowController::class, 'delete'])->name('delete');
    Route::get('/imageslideshow/update/{id}', [App\Http\Controllers\Admin\ImagesSlideShowController::class, 'edit'])->name('edit');
    Route::post('/imageslideshow/update/{id}', [App\Http\Controllers\Admin\ImagesSlideShowController::class, 'update'])->name('update');


    // image galery
    Route::get('/imagegalery', [App\Http\Controllers\Admin\ImageGaleryController::class, 'index']);
    Route::post('/imagegalery/create', [App\Http\Controllers\Admin\ImageGaleryController::class, 'create'])->name('create');
    Route::get('/imagegalery/delete/{id}', [App\Http\Controllers\Admin\ImageGaleryController::class, 'delete'])->name('delete');
    Route::get('/imagegalery/update/{id}', [App\Http\Controllers\Admin\ImageGaleryController::class, 'edit'])->name('edit');
    Route::post('/imagegalery/update/{id}', [App\Http\Controllers\Admin\ImageGaleryController::class, 'update'])->name('update');


    // config
    Route::get('/config', [App\Http\Controllers\Admin\ConfigController::class, 'index']);
    Route::post('/config/create', [App\Http\Controllers\Admin\ConfigController::class, 'create'])->name('create');
    Route::get('/config/delete/{id}', [App\Http\Controllers\Admin\ConfigController::class, 'delete'])->name('delete');
    Route::get('/config/update/{id}', [App\Http\Controllers\Admin\ConfigController::class, 'edit'])->name('edit');
    Route::post('/config/update/{id}', [App\Http\Controllers\Admin\ConfigController::class, 'update'])->name('update');


    // resource
    Route::get('/resource', [App\Http\Controllers\Admin\ResourceController::class, 'index']);
    Route::post('/resource/create', [App\Http\Controllers\Admin\ResourceController::class, 'create'])->name('create');
    Route::get('/resource/delete/{id}', [App\Http\Controllers\Admin\ResourceController::class, 'delete'])->name('delete');
    Route::get('/resource/update/{id}', [App\Http\Controllers\Admin\ResourceController::class, 'edit'])->name('edit');
    Route::post('/resource/update/{id}', [App\Http\Controllers\Admin\ResourceController::class, 'update'])->name('update');



    // product
    Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index']);
    Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'add'])->name('add');
    Route::post('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
    Route::get('/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('delete');
    Route::get('/product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
    Route::post('/product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');



    // post
    Route::get('/post', [App\Http\Controllers\Admin\PostsController::class, 'index']);
    Route::get('/post/create', [App\Http\Controllers\Admin\PostsController::class, 'add'])->name('add');
    Route::post('/post/create', [App\Http\Controllers\Admin\PostsController::class, 'create'])->name('create');
    Route::get('/post/delete/{id}', [App\Http\Controllers\Admin\PostsController::class, 'delete'])->name('delete');
    Route::get('/post/update/{id}', [App\Http\Controllers\Admin\PostsController::class, 'edit'])->name('edit');
    Route::post('/post/update/{id}', [App\Http\Controllers\Admin\PostsController::class, 'update'])->name('update');


    // User
    Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index']);



});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



