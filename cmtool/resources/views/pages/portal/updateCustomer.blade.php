@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">Update Customer</h1>
        {{-- <h1 style="margin-top:20px; ">保守先一覧</h1> --}}
        {{ Form::open(['action' => ['PortalPageController@updateCustomer', $customer->customer_id], 'method' => 'POST']) }}
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('customer.addid') }}:</label>
                {{Form::text('customer_id', $customer->customer_id, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('customer.addid'), 'readonly' => 'true'])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('customer.addname') }}:</label>
                {{Form::text('customer_name', $customer->customer_name, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('customer.addname')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('customer.addstaff') }}:</label>
                {{Form::text('customer_staff', $customer->customer_staff, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('customer.addstaff')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('customer.addtel') }}:</label>
                {{Form::text('customer_tel', $customer->customer_tel, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('customer.addtel')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('customer.addmail') }}:</label>
                {{Form::text('customer_mail', $customer->customer_mail, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('customer.addmail')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('customer.addmemo') }}:</label>
                {{Form::text('customer_memo', $customer->customer_memo, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('customer.addmemo')])}}
            </div>
            {{Form::hidden('customerId', $customer->customer_id)}}
            <br><br><br>
            
        <div style="display:flex; float:right; margin-right:120px; margin-bottom:20px">
            {{Form::submit( __('customer.update') , ['style' => 'margin-left:5px', 'class' => 'btn btn-primary'])}}
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 
        
            {{ Form::open(['action' => ['PortalPageController@deleteCustomer', $customer->customer_id], 'method' => 'POST']) }}
                <button style="margin-left:5px" type="submit" class="btn btn-danger" 
                    onclick="return confirm('Are you sure you want to delete this customer?')">{{ __('customer.delete') }}</button>
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 

            <a style="margin-left:5px" href={{ redirect()->getUrlGenerator()->previous() }} 
                class="btn btn-secondary">{{ __('customer.cancel') }}</a>
        </div>
    </div>

<style>
</style>

@endsection