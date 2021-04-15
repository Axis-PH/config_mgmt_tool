@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="content">
        <div class="title m-b-md">
            <br>
            <h2>
                Item Information
            </h2>
        </div>
            <div class="form-group">
                Item Name: {{$item->name}}
            </div>
            <div class="form-group">
                Item Category: {{$item->equipmentClassificationId}}
            </div>
            <div class="form-group">
                Model: {{$item->model}}
            </div>
            <div class="form-group">
                S/N: {{$item->serialNumber}}
            </div>
            <div class="form-group">
                IP Address: {{$item->ipAddress}}
            </div>
            <div class="form-group">
                Netmask: {{$item->netmask}}
            </div>
            <div class="form-group">
                Gateway: {{$item->gateway}}
            </div>
            <div class="form-group">
                Customer ID: {{$item->customerId}}
            </div>
            <div class="form-group">
                Site ID: {{$item->baseId}}
            </div>
            <div class="form-group">
                Installation Location: {{$item->installationLocation}}
            </div>
            <div class="form-group">
                Maker ID: {{$item->makerId}}
            </div>
            <div class="form-group">
                Remarks: {{$item->remarks}}
            </div>
        <a href={{ redirect()->getUrlGenerator()->previous() }} class="btn btn-primary">Return</a>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::close() }} 
    </div>
</div>
@endsection
   