@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">Update Customer</h1>
        {{-- <h1 style="margin-top:20px; ">保守先一覧</h1> --}}
        {{ Form::open(['action' => ['PortalPageController@updateCustomer', $customers->customer_id], 'method' => 'POST']) }}
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('ID: ') }}</label>
                {{Form::text('name', $customers->customer_id, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('ID')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Customer Name: ') }}</label>
                {{Form::text('name', $customers->customer_name, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Customer Name')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('PIC: ') }}</label>
                {{Form::text('name', $customers->customer_staff, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Person In Charge')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Tel: ') }}</label>
                {{Form::text('name', $customers->customer_tel, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Telephone')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Email: ') }}</label>
                {{Form::text('name', $customers->customer_mail, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Email')])}}
            </div>
            <br><br>
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Remarks: ') }}</label>
                {{Form::text('name', $customers->customer_memo, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Remarks')])}}
            </div>
            {{Form::hidden('customerId', $customers->customer_id)}}
            <br><br><br>
            
        <div style="display:flex; float:right; margin-right:120px; margin-bottom:20px">
            {{Form::submit( __('Update') , ['style' => 'margin-left:5px', 'class' => 'btn btn-primary'])}}
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 
        
            {{ Form::open(['action' => ['PortalPageController@deleteCustomer', $customers->customer_id], 'method' => 'POST']) }}
                <button style="margin-left:5px" type="submit" class="btn btn-danger" 
                    onclick="return confirm('Are you sure you want to delete this customer?')">{{ 'Delete' }}</button>
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 

            <a style="margin-left:5px" href={{ redirect()->getUrlGenerator()->previous() }} 
                class="btn btn-secondary">{{ __('Cancel') }}</a>
        </div>
    </div>

<style>
</style>

@endsection