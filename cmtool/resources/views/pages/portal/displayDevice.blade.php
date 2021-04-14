@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="content">
        <div class="title m-b-md">
            <br>
            <h2>
                Device Information
            </h2>
        </div>
            <div class="form-group">
                Device Name: {{$equipment->name}}
            </div>
            <div class="form-group">
                Device Classification Number: {{$equipment->equipmentClassificationId}}
            </div>
            <div class="form-group">
                Model: {{$equipment->model}}
            </div>
            <div class="form-group">
                S/N: {{$equipment->serialNumber}}
            </div>
            <div class="form-group">
                IP Address: {{$equipment->ipAddress}}
            </div>
            <div class="form-group">
                Netmask: {{$equipment->netmask}}
            </div>
            <div class="form-group">
                Gateway: {{$equipment->gateway}}
            </div>
            <div class="form-group">
                Customer ID: {{$equipment->customerId}}
            </div>
            <div class="form-group">
                Site ID: {{$equipment->baseId}}
            </div>
            <div class="form-group">
                Installation Location: {{$equipment->installationLocation}}
            </div>
            <div class="form-group">
                Maker ID: {{$equipment->makerId}}
            </div>
            <div class="form-group">
                Remarks: {{$equipment->remarks}}
            </div>
        <a href={{ redirect()->getUrlGenerator()->previous() }} class="btn btn-primary">Return</a>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::close() }} 
    </div>
</div>
@endsection
   