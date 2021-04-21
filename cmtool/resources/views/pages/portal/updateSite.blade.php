@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">{{ __('site.updateSite') }}</h1>
        {{-- <h1 style="margin-top:20px; ">保守先一覧</h1> --}}
        {{ Form::open(['action' => ['PortalPageController@updateSite', $site->site_id], 'method' => 'POST']) }}
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('site.site') }}</label>
                {{Form::text('site_name', $site->site_name, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('site.siteName')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('site.customerName') }}</label>
                {{Form::select('customer_id', $customers, $selectedCustomerId, ['style' => 'float:right; width:500px; margin-right: 120px',
                    'class' => 'form-control'])}}
            </div>
            {{Form::hidden('site_id', $site->site_id)}}
            <br><br><br>
            
        <div style="display:flex; float:right; margin-right:120px; margin-bottom:20px">
            {{Form::submit( __('site.update') , ['style' => 'margin-left:5px', 'class' => 'btn btn-primary'])}}
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 
        
            {{ Form::open(['action' => ['PortalPageController@deleteSite', $site->site_id], 'method' => 'POST']) }}
                <button style="margin-left:5px" type="submit" class="btn btn-danger" 
                    onclick="return confirm('<?php echo(__('site.deleteMessage') ); ?>')">{{  __('site.delete') }}</button>
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 

            <a style="margin-left:5px" href={{ '/sites' }} 
                class="btn btn-secondary">{{ __('site.back') }}</a>
        </div>
    </div>

<style>
</style>

@endsection


{{-- onclick="return confirm('Are you sure you want to delete this site?')">{{  __('site.delete') }}</button> --}}