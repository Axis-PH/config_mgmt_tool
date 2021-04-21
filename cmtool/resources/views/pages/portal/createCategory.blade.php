@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">{{ __('Create Category') }}</h1>
        {{ Form::open(['action' => ['PortalPageController@addCategory'], 'method' => 'POST']) }}
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Category Name: ') }}</label>
                {{Form::text('categoryName', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Category Name')])}}
            </div>    
            <br><br><br>
            
        <div style="display:flex; float:right; margin-right:120px; margin-bottom:20px">
            {{Form::submit(__('Create Category'), ['class' => 'btn btn-primary'])}}
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 

            <a style="margin-left:5px" href={{ redirect()->getUrlGenerator()->previous() }} 
                class="btn btn-secondary">{{ __('Cancel') }}</a>
        </div>
    </div>

<style>
</style>

@endsection