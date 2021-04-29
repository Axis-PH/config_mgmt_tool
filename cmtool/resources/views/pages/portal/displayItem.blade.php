
@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">{{ __('item.itemInfo') }}</h1>

            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.name') }}</label>
                {{Form::text('itemName', $item->item_name, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.category') }}</label>
                {{Form::text('itemCategory', $categoryName, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.model') }}</label>
                {{Form::text('model', $item->model, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.serial') }}</label>
                {{Form::text('serialNumber', $item->serial, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.ip') }}</label>
                {{Form::text('ipAddress', $item->ip, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.netmask') }}</label>
                {{Form::text('netmask', $item->netmask, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.gateway') }}</label>
                {{Form::text('gateway', $item->gateway, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.customer') }}</label>
                {{Form::text('customerName', $customerName, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.site') }}</label>
                {{Form::text('gateway', $siteName, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.location') }}</label>
                {{Form::text('installationLocation', $item->place, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.maker') }}</label>
                {{Form::text('makerId', $makerName, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.memo') }}</label>
                {{Form::text('remarks', $item->memo, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'readonly' => 'true'])}}            
            </div>
            <br><br><br>
            
            <a href={{ redirect()->getUrlGenerator()->previous() }} class="btn btn-primary">{{ __('item.back') }}</a>
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 
        </div>
    </div>

<style>
</style>

@endsection