@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; "> {{ __('site.createSite') }} </h1>
        {{-- <h1 style="margin-top:20px; ">保守先一覧</h1> --}}
        {{ Form::open(['action' => ['PortalPageController@addSite'], 'method' => 'POST']) }}
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('site.site').': ' }}</label>
                {{Form::text('site_name', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'required' => true, 'placeholder' => __('site.siteName') ])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{  __('site.customerName')  }}</label>
                {{Form::select('customer_id', $customers, '', ['style' => 'float:right; width:500px; margin-right: 120px',
                    'class' => 'form-control'])}}
            </div>
            {{Form::hidden('projectId', 2)}}
            <br><br><br>
        {{Form::submit( __('site.create') , ['class' => 'btn btn-primary'])}}
        <a href={{ '/sites' }} class="btn btn-link">{{ __('site.back') }}</a>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::close() }} 
        <div style="margin-top:10px; margin-bottom:10px"></div>
    </div>

<style>
</style>

@endsection