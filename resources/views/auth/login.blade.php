@extends('layouts.app')

@section('content')
    
    <style>
        .v--login-page {
            margin-top: 5%;
        }
        .v--login-page-info {
            margin-top: -20px;
        }
    </style>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mx-auto v--login-page">
                @include('auth.partials.login')
            </div>
        </div>
    </div>
    
    
@endsection
