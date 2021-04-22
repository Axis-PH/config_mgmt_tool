
@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">{{ __('Item Information') }}</h1>

            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Item Name: ') }}</label>
                {{Form::text('itemName', $item->item_name, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Item Name'), 'readonly' => 'true'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Item Category: ') }}</label>
                {{Form::text('itemCategory', $categoryName, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Model: ') }}</label>
                {{Form::text('model', $item->model, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Model'), 'readonly' => 'true'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Serial Number: ') }}</label>
                {{Form::text('serialNumber', $item->serial, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Serial Number'), 'readonly' => 'true'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('IP Address: ') }}</label>
                {{Form::text('ipAddress', $item->ip, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('IP Address'), 'readonly' => 'true'])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Netmask: ') }}</label>
                {{Form::text('netmask', $item->netmask, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Netmask'), 'readonly' => 'true'])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Gateway: ') }}</label>
                {{Form::text('gateway', $item->gateway, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Gateway'), 'readonly' => 'true'])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Customer Name: ') }}</label>
                {{Form::text('customerName', $customerName, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Customer Name'), 'readonly' => 'true'])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Site Name: ') }}</label>
                {{Form::text('gateway', $siteName, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Site Name'), 'readonly' => 'true'])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Location: ') }}</label>
                {{Form::text('installationLocation', $item->place, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Installation Location'), 'readonly' => 'true'])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Maker: ') }}</label>
                {{Form::text('makerId', $makerName, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Remarks: ') }}</label>
                {{Form::text('remarks', $item->maker_id, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Remarks'), 'readonly' => 'true'])}}            
            </div>
            <br><br><br>
            
            <a href={{ redirect()->getUrlGenerator()->previous() }} class="btn btn-primary">Return</a>
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 
        </div>
    </div>

<style>
</style>

@endsection