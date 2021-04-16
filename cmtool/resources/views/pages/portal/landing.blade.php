@extends('layouts.app')

@section('content')
{{-- @include('includes.messages') --}}
    <div style="display: inline-block; width: 600px; border:1px solid black;">
        <h1 style="margin-top:20px; ">Portal</h1>
        {{-- <h1 style="margin-top:20px; ">ポータルメニュー</h1> --}}
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 col-sm-8 pull-left">
                <div class="card-body row justify-content-center" >
                    {{-- @auth --}}
                    <div class="form-group row justify-content-center" style="width:100%;padding-top:15px">
                        <div class="col-md-7" style="padding:5px">
                            <a href="{{ url("/site") }}" class="btn btn-primary" 
                                style="font-size:20px; width:100%; height: 100%"> {{ __('Maintenance Destination List') }} </a>
                                {{-- style="font-size:20px; width:100%; height: 100%"> {{ __('保守先一覧') }} </a> --}}
                        </div>
                        <div class="col-md-7" style="padding:5px">
                            <a href="{{ url('/contactLanding') }}" class="btn btn-primary" 
                                style="font-size:20px; width:100%; height: 100%"> {{ __('Makers/Customer') }} </a>
                                {{-- style="font-size:20px; width:100%; height: 100%"> {{ __('連絡先一覧') }} </a> --}}
                        </div>
                        {{-- <div class="col-md-7" style="padding:5px">
                            <a href="{{ url('/') }}" class="btn btn-primary" 
                                style="font-size:20px; width:100%; height: 100%"> {{ __('Main Menu') }} </a> --}}
                                {{-- style="font-size:20px; width:100%; height: 100%"> {{ __('総合メニュー') }} </a> --}}
                        {{-- </div> --}}
                    </div>
                    {{-- @endauth --}}
                </div>
            </div>
        </div>
        {{-- <div style="margin-top:-10px; margin-bottom:10px">
            <a href={{ '/' }} class="btn btn-link" 
                style="background-color: #f1f1f1; width: 100px; border: 1px solid black; font-size:15px;">{{ __('バック') }}</a>
        </div> --}}
    </div>
@endsection