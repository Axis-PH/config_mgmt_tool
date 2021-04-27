@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">{{ __('maker.updateMaker') }}</h1>
        {{-- <h1 style="margin-top:20px; ">保守先一覧</h1> --}}
        {{ Form::open(['action' => ['PortalPageController@updateMaker', $maker->maker_id], 'method' => 'POST']) }}
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('maker.name') }}</label>
                {{Form::text('maker_name', $maker->maker_name, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Name')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('maker.staff') }}</label>
                {{Form::text('maker_staff', $maker->maker_staff, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Person In Charge')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('maker.tel') }}</label>
                {{Form::text('maker_tel', $maker->maker_tel, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Telephone')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('maker.email') }}</label>
                {{Form::text('maker_mail', $maker->maker_mail, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Email')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('maker.hpAddress') }}</label>
                {{Form::text('hp_address', $maker->hp_address, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('hp address')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('maker.memo') }}</label>
                {{Form::text('maker_memo', $maker->maker_memo, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('memo')])}}
            </div>
            {{Form::hidden('maker_id', $maker->maker_id)}}
            <br><br><br>
            
        <div style="display:flex; float:right; margin-right:120px; margin-bottom:20px">
            {{Form::submit( __('maker.update') , ['style' => 'margin-left:5px', 'class' => 'btn btn-primary'])}}
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 
        
            {{ Form::open(['action' => ['PortalPageController@deleteMaker', $maker->maker_id], 'method' => 'POST']) }}
                <button style="margin-left:5px" type="submit" class="btn btn-danger" 
                    onclick="return confirm('<?php echo(__('maker.deleteMessage') ); ?>')">{{ __('maker.delete') }}</button>
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 

            <a style="margin-left:5px" href={{ '/makers' }} class="btn btn-secondary">{{ __('maker.back') }}</a>
        </div>
    </div>

<style>
</style>

@endsection