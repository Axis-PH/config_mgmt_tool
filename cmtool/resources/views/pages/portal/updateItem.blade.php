@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">{{ __('Update Item') }}</h1>
        {{ Form::open(['action' => ['PortalPageController@updateItem', $id, $siteId, $customerId], 'method' => 'POST']) }}
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Item Name: ') }}</label>
                {{Form::text('itemName', $item->item_name, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Item Name')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Item Category: ') }}</label>
                {{Form::select('itemCategory', $categories, $item->category, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Model: ') }}</label>
                {{Form::text('model', $item->model, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Model')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Serial Number: ') }}</label>
                {{Form::text('serialNumber', $item->serial, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Serial Number')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('IP Address: ') }}</label>
                {{Form::text('ipAddress', $item->ip, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('IP Address')])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Netmask: ') }}</label>
                {{Form::text('netmask', $item->netmask, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Netmask')])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Gateway: ') }}</label>
                {{Form::text('gateway', $item->gateway, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Gateway')])}}            
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Location: ') }}</label>
                {{Form::text('installationLocation', $item->place, ['style' => 'float:right; width:500px; margin-right: 120px', 
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
                {{Form::text('remarks', $item->maker_id, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Remarks')])}}            
            </div>
            <br><br><br>
            
            <a href="{{ url('/items/delete' . '/' . $item->item_id) }}" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to proceed with the deletion of this category?')">Delete</a>
                {{Form::submit('Update Item', ['class' => 'btn btn-primary'])}}
                <a href={{ redirect()->getUrlGenerator()->previous() }} class="btn btn-link">Cancel</a>
                {{ Form::hidden('_method', 'PUT')}}
                {{ Form::close() }} 
        </div>
    </div>

<style> 
</style>

@endsection