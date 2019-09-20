@extends('layouts.app')

@section('content')
    <style>
        .v--login-page,
        .v--login-page-info{
            margin-top: 5%;
        }
    </style>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mx-auto v--login-page">
                @include('auth.partials.register')
            </div>
        </div>
        <div class="row align-items-end v--login-page-info">
            <div class="col mx-auto text-right">
                <h2 class="v--title">چی بخونم؟</h2>
                <br>
                <span class="v--hint">
                    رای بدید و کتاب های منتخب رو با بیشترین تخفیف ببرید
                    <br>
                    رای به ضروری ترین کتـــاب ها با بیشترین صرفه اقتصادی
                </span>
            </div>
        </div>
    </div>
@endsection
