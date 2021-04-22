@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">{{ __('Create Item') }}</h1>
        {{ Form::open(['action' => ['PortalPageController@addItem', $siteId, $customerId], 'method' => 'POST']) }}
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Item Name: ') }}</label>
                {{Form::text('itemName', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Item Name')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Item Category: ') }}</label>
                {{Form::select('itemCategory', $categories, '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Model: ') }}</label>
                {{Form::text('model', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Model')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Serial Number: ') }}</label>
                {{Form::text('serialNumber', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Serial Number')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('IP Address: ') }}</label>
                {{Form::text('ipAddress', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('IP Address')])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Netmask: ') }}</label>
                {{Form::text('netmask', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Netmask')])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Gateway: ') }}</label>
                {{Form::text('gateway', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Gateway')])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Location: ') }}</label>
                {{Form::text('installationLocation', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Installation Location')])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Maker: ') }}</label>
                {{Form::select('makerId', $makers, '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Remarks: ') }}</label>
                {{Form::text('remarks', '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Remarks')])}}            
            </div>
            <br><br><br>
            
        <div style="display:flex; float:right; margin-right:120px; margin-bottom:20px">
            {{Form::submit(__('Create Item'), ['class' => 'btn btn-primary'])}}
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 

            <a style="margin-left:5px" href={{ redirect()->getUrlGenerator()->previous() }} 
                class="btn btn-secondary">{{ __('Cancel') }}</a>
        </div>
    </div>

<style>
</style>

@endsection