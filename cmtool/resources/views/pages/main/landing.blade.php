@extends('layouts.app')

@section('content')
{{-- @include('includes.messages') --}}
    <div style="display: inline-block; width: 600px; border:1px solid black;">
        <h1 style="margin-top:20px; ">総合メニュー</h1>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 col-sm-8 pull-left">
                <div class="card-body row justify-content-center" >
                    {{-- @auth --}}
                    <div class="form-group row justify-content-center" style="width:100%;padding-top:15px">
                        <div class="col-md-7" style="padding:5px">
                            <a href="{{ url("/portal") }}" class="btn btn-primary" 
                                style="font-size:20px; width:100%; height: 100%"> {{ __('Portal') }} </a>
                                {{-- style="font-size:20px; width:100%; height: 100%"> {{ __('ポータルメニュー') }} </a> --}}
                        </div>
                        <div class="col-md-7" style="padding:5px">
                            <a href="{{ url('/admin') }}" class="btn btn-primary" 
                                style="font-size:20px; width:100%; height: 100%"> {{ __('Admin') }} </a>
                                {{-- style="font-size:20px; width:100%; height: 100%"> {{ __('管理メニュー') }} </a> --}}
                        </div>
                    </div>
                    {{-- @endauth --}}
                </div>
            </div>
        </div>
    </div>
@endsection