@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">Create Site</h1>
        {{-- <h1 style="margin-top:20px; ">保守先一覧</h1> --}}
        {{ Form::open(['action' => ['PortalPageController@addSite', 1], 'method' => 'POST']) }}
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Site: ') }}</label>
                {{Form::text('name', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Site Name')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Customer: ') }}</label>
                {{Form::select('customerId', $customers, '', ['style' => 'float:right; width:500px; margin-right: 120px',
                    'class' => 'form-control'])}}
            </div>
            {{Form::hidden('projectId', 2)}}
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