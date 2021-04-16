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
                Item Name: {{$item->item_name}}
            </div>
            <div class="form-group">
                Item Category: {{$item->category}}
            </div>
            <div class="form-group">
                Model: {{$item->model}}
            </div>
            <div class="form-group">
                S/N: {{$item->serial}}
            </div>
            <div class="form-group">
                IP Address: {{$item->ip}}
            </div>
            <div class="form-group">
                Netmask: {{$item->netmask}}
            </div>
            <div class="form-group">
                Gateway: {{$item->gateway}}
            </div>
            <div class="form-group">
                Customer ID: {{$item->customer_id}}
            </div>
            <div class="form-group">
                Site ID: {{$item->site_id}}
            </div>
            <div class="form-group">
                Installation Location: {{$item->place}}
            </div>
            <div class="form-group">
                Maker ID: {{$item->maker_id}}
            </div>
            <div class="form-group">
                Remarks: {{$item->memo}}
            </div>
        <a href={{ redirect()->getUrlGenerator()->previous() }} class="btn btn-primary">Return</a>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::close() }} 
    </div>
</div>
@endsection
   