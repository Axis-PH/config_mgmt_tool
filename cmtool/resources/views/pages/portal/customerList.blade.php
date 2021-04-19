@extends('layouts.app')

@section('content')
{{-- @include('includes.messages') --}}
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">連絡先一覧</h1>
        {{-- <h1 style="margin-top:20px; ">Contact List</h1> --}}
        <div style="float:left; padding:5px">
            <a href="{{ url("customers/create") }}" class="btn btn-success" 
                style="font-size:15px; width:100px; height: 100%">{{ __('Create') }}</a>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead class="thead-dark">
            <tr>
                <th class="nameHeader">{{ __('Id') }}</th>
                <th class="nameHeader">{{ __('Name') }}</th>
                <th class="nameHeader">{{ __('NamePIC') }}</th>
                <th class="otherHeader">{{ __('Tel #') }}</th>
                <th class="otherHeader">{{ __('Email') }}</th>
                <th class="otherHeader">{{ __('Remarks') }}</th>
                <th class="otherHeader"></th>
                <!-- <th class="otherHeader"></th> -->
            </tr>
            </thead>
                @foreach ($customers as $customer)
                <tr>
                    <td>{{$customer->customer_id}}</td>
                    <td>{{$customer->customer_name}}</td>
                    <td>{{ $customer->customer_staff }}</td>
                    <td>{{ $customer->customer_tel }}</td>
                    <td>{{ $customer->customer_mail }}</td>
                    <td>{{ $customer->customer_memo }}</td>
                    <td>
                        <a href="{{ url("customers/update/" .$customer->customer_id) }}" 
                            class="btn btn-success" style="font-size:15px; width:70px; height: 100%">{{ __('edit') }}</a>
                    </td>
                    <!-- <td>
                        <a href="{{ url("maintenance/project/user_setu") }}" 
                            class="btn btn-primary" style="font-size:15px; width:70px; height: 100%">{{ __('delete') }}</a>
                    </td>  -->
                </tr> 
                @endforeach
        </table>
        <div style="margin-top:-10px; margin-bottom:10px">
            <a href={{ '/contactLanding' }} class="btn btn-link" 
                style="background-color: #f1f1f1; width: 100px; border: 1px solid black; font-size:15px;">{{ __('バック') }}</a>
        </div>
    </div>

<style>

    .nameHeader {
        text-align:center; 
        width:11%; 
        border: 1px solid black
    }

    .otherHeader {
        text-align:center; 
        width:11%; 
        border: 1px solid black
    }

    td {
        text-align: center; 
    }

</style>

@endsection