@extends('layouts.app')

@section('content')

{{--    <i class="fa fa-circle-o" aria-hidden="true"></i>--}}
{{--    <i class="fa fa-check" aria-hidden="true"></i>--}}
{{--    <i class="fa fa-plus" aria-hidden="true"></i>--}}
{{--    <i class="fa fa-minus" aria-hidden="true"></i>--}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">

                <collapse-group v-bind:collapse-data="[]"></collapse-group>

            </div>
        </div>
    </div>
@endsection



@section('page-js')

@endsection
