@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="content">
        <div class="title m-b-md">
            <br>
            <h2>
                Create Device
            </h2>
        </div>
        {{ Form::open(['action' => ['PortalPageController@addDevice'], 'method' => 'POST']) }}
            <div class="form-group">
                Device Name:
                {{Form::text('deviceName', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                Device Classification Number:
                {{Form::text('deviceClassificationNumber', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                Model:
                {{Form::text('model', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                S/N:
                {{Form::text('serialNumber', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                IP Address:
                {{Form::text('ipAddress', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                Netmask:
                {{Form::text('netmask', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                Gateway:
                {{Form::text('gateway', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                Customer ID:
                {{Form::text('customerId', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                Site ID:
                {{Form::text('siteId', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                Installation Location:
                {{Form::text('installationLocation', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                Maker ID:
                {{Form::text('makerId', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                Remarks:
                {{Form::text('remarks', '', ['class' => 'form-control'])}}
            </div>
        {{Form::submit('Add Device', ['class' => 'btn btn-primary'])}}
        <a href={{ redirect()->getUrlGenerator()->previous() }} class="btn btn-link">Cancel</a>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::close() }} 
    </div>
</div>
@endsection
   