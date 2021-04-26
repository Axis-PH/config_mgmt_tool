@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">{{ __('item.updateItem') }}</h1>
        {{ Form::open(['action' => ['PortalPageController@updateItem', $id, $siteId, $customerId], 'method' => 'POST']) }}
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.name') }}</label>
                {{Form::text('itemName', $item->item_name, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Item Name')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.category') }}</label>
                {{Form::select('itemCategory', $categories, $item->category, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.model') }}</label>
                {{Form::text('model', $item->model, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Model')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.serial') }}</label>
                {{Form::text('serialNumber', $item->serial, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Serial Number')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.ip') }}</label>
                {{Form::text('ipAddress', $item->ip, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('IP Address')])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.netmask') }}</label>
                {{Form::text('netmask', $item->netmask, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Netmask')])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.gateway') }}</label>
                {{Form::text('gateway', $item->gateway, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Gateway')])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.location') }}</label>
                {{Form::text('installationLocation', $item->place, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Installation Location')])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.maker') }}</label>
                {{Form::select('makerId', $makers, '', ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('item.memo') }}</label>
                {{Form::text('remarks', $item->maker_id, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Remarks')])}}            
            </div>
            <br><br><br>
            {{Form::submit(__('item.update'), ['class' => 'btn btn-primary'])}}
            <a href="{{ url('/items/delete' . '/' . $item->item_id) }}" class="btn btn-danger"
                onclick="return confirm('<?php echo(__('item.deleteMessage'));?>')">{{ __('item.delete') }}</a>
                <a href={{ redirect()->getUrlGenerator()->previous() }} class="btn btn-secondary">{{ __('item.cancel') }}</a>
                {{ Form::hidden('_method', 'PUT')}}
                {{ Form::close() }} 
        </div>
    </div>

<style> 
</style>

@endsection