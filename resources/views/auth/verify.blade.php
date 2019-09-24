@extends('layouts.app')

@section('page-css')
    <style>
        .v--login-page {
            margin-top: 5%;
        }
        .v--login-page-info {
            margin-top: -20px;
        }
    </style>
    
@endsection
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-11 col-sm-10 col-md-8 col-lg-4 mx-auto v--login-page">
                @include('auth.partials.verify')
            </div>
        </div>
    </div>

@endsection
