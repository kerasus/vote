@extends('layouts.app')

@section('page-css')
    <style>
        .v--login-page,
        .v--login-page-info{
            margin-top: 5%;
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
