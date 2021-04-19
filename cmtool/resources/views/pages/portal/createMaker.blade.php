@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">Create Maker</h1>
        {{-- <h1 style="margin-top:20px; ">保守先一覧</h1> --}}
        {{ Form::open(['action' => ['PortalPageController@addMaker'], 'method' => 'POST']) }}
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Name: ') }}</label>
                {{Form::text('maker_name', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Name')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Person In Charge: ') }}</label>
                {{Form::text('maker_staff', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Name')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Telephone: ') }}</label>
                {{Form::text('maker_tel', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('000-0000-0000')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Email: ') }}</label>
                {{Form::text('maker_mail', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('xxx@email.com')])}}
            </div>
            <br><br><br>
        {{Form::submit( __('Create') , ['class' => 'btn btn-primary'])}}
        <a href={{ redirect()->getUrlGenerator()->previous() }} class="btn btn-link">{{ __('Cancel') }}</a>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::close() }} 
        <div style="margin-top:10px; margin-bottom:10px"></div>
    </div>

<style>
</style>

@endsection