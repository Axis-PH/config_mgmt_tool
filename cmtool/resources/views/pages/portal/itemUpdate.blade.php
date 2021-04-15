@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="content">
        <div class="title m-b-md">
            <br>
            <h2>
                Update Item
            </h2>
        </div>
        {{ Form::open(['action' => ['PortalPageController@updateItem', $id, $siteId, $customerId], 'method' => 'POST']) }}
        <div class="form-group">
            Item Name:
            {{Form::text('itemName', $item->name, ['class' => 'form-control', 'placeholder' => 'Item Name'])}}
        </div>
        <div class="form-group">
            Item Category:
            {{Form::text('itemCategory', $item->equipmentClassificationId, ['class' => 'form-control', 'placeholder' => 'Item Category'])}}
        </div>
        <div class="form-group">
            Model:
            {{Form::text('model', $item->model, ['class' => 'form-control', 'placeholder' => 'Model'])}}
        </div>
        <div class="form-group">
            S/N:
            {{Form::text('serialNumber', $item->serialNumber, ['class' => 'form-control', 'placeholder' => 'S/N'])}}
        </div>
        <div class="form-group">
            IP Address:
            {{Form::text('ipAddress', $item->ipAddress, ['class' => 'form-control', 'placeholder' => 'IP Address'])}}
        </div>
        <div class="form-group">
            Netmask:
            {{Form::text('netmask', $item->netmask, ['class' => 'form-control', 'placeholder' => 'Netmask'])}}
        </div>
        <div class="form-group">
            Gateway:
            {{Form::text('gateway', $item->gateway, ['class' => 'form-control', 'placeholder' => 'Gateway'])}}
        </div>
        <div class="form-group">
            Installation Location:
            {{Form::text('installationLocation', $item->installationLocation, ['class' => 'form-control', 'placeholder' => 'Installation Location'])}}
        </div>
        <div class="form-group">
            Maker ID:
            {{Form::text('makerId', $item->makerId, ['class' => 'form-control', 'placeholder' => 'Maker ID'])}}
        </div>
        <div class="form-group">
            Remarks:
            {{Form::text('remarks', $item->remarks, ['class' => 'form-control', 'placeholder' => 'Remarks'])}}
        </div>
        <a href="{{ url('/deleteItem' . '/' . $siteId . '/' . $customerId . '/' . $item->id) }}" class="btn btn-danger">Delete</a>
        {{Form::submit('Update Item', ['class' => 'btn btn-primary'])}}
        <a href={{ redirect()->getUrlGenerator()->previous() }} class="btn btn-link">Cancel</a>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::close() }} 
    </div>
</div>
@endsection
   