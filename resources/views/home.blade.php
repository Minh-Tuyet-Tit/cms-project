@extends('layouts.layoutAdmin')

@section('main')

    <div class="container">
        <div class="card text-center bg-gradient-gray">
          <div class="card-body">
            <h1 class="mb-5">Please log in</h1>
            <a class="btn btn-lg btn-primary card-text" href="{{ route('login') }}">{{ __('Login') }}</a>
          </div>
        </div>
    </div>
    <li class="nav-item">
        
    </li>
@endsection()
