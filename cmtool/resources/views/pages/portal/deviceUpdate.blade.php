@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="content">
        <div class="title m-b-md">
            <br>
            <h2>
                Update Device
            </h2>
        </div>
        {{ Form::open(['action' => ['PortalPageController@updateDevice', $id], 'method' => 'POST']) }}
        <div class="form-group">
            Device Name:
            {{Form::text('deviceName', $equipment->name, ['class' => 'form-control', 'placeholder' => 'Device Name'])}}
        </div>
        <div class="form-group">
            Device Classification Number:
            {{Form::text('deviceClassificationNumber', $equipment->equipmentClassificationId, ['class' => 'form-control', 'placeholder' => 'Device Classification Number'])}}
        </div>
        <div class="form-group">
            Model:
            {{Form::text('model', $equipment->model, ['class' => 'form-control', 'placeholder' => 'Model'])}}
        </div>
        <div class="form-group">
            S/N:
            {{Form::text('serialNumber', $equipment->serialNumber, ['class' => 'form-control', 'placeholder' => 'S/N'])}}
        </div>
        <div class="form-group">
            IP Address:
            {{Form::text('ipAddress', $equipment->ipAddress, ['class' => 'form-control', 'placeholder' => 'IP Address'])}}
        </div>
        <div class="form-group">
            Netmask:
            {{Form::text('netmask', $equipment->netmask, ['class' => 'form-control', 'placeholder' => 'Netmask'])}}
        </div>
        <div class="form-group">
            Gateway:
            {{Form::text('gateway', $equipment->gateway, ['class' => 'form-control', 'placeholder' => 'Gateway'])}}
        </div>
        <div class="form-group">
            Customer ID:
            {{Form::text('customerId', $equipment->customerId, ['class' => 'form-control', 'placeholder' => 'Customer ID'])}}
        </div>
        <div class="form-group">
            Site ID:
            {{Form::text('siteId', $equipment->baseId, ['class' => 'form-control', 'placeholder' => 'Site ID'])}}
        </div>
        <div class="form-group">
            Installation Location:
            {{Form::text('installationLocation', $equipment->installationLocation, ['class' => 'form-control', 'placeholder' => 'Installation Location'])}}
        </div>
        <div class="form-group">
            Maker ID:
            {{Form::text('makerId', $equipment->makerId, ['class' => 'form-control', 'placeholder' => 'Maker ID'])}}
        </div>
        <div class="form-group">
            Remarks:
            {{Form::text('remarks', $equipment->remarks, ['class' => 'form-control', 'placeholder' => 'Remarks'])}}
        </div>
        {{Form::submit('Update Device', ['class' => 'btn btn-primary'])}}
        <a href={{ redirect()->getUrlGenerator()->previous() }} class="btn btn-link">Cancel</a>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::close() }} 
    </div>
</div>
@endsection
   