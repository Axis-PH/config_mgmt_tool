@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">Customer List</h1>
        {{-- <h1 style="margin-top:20px; ">保守先一覧</h1> --}}
        <div style="float:left; padding:5px">
            <a href="{{ url("contactList/create") }}" class="btn btn-success" 
                style="font-size:15px; width:100px; height: 100%">{{ __('Create') }}</a>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead class="thead-dark">
            <tr>
                {{-- <th class="nameHeader">{{ __('拠点名') }}</th> --}}
                <th class="nameHeader">{{ __('Site') }}</th>
                {{-- <th class="dateTimeHeader">{{ __('顧客名') }}</th> --}}
                <th class="dateTimeHeader">{{ __('Customer') }}</th>
                <th class="deviceHeader"></th>
                <th class="otherHeader"></th>
                <th class="otherHeader"></th>
            </tr>
            </thead>
                @foreach ($sites as $site)
                <tr>
                    <td>{{$site->name}}</td>

                    <?php 
                        if (!empty($site->customer->name)) 
                            $siteName = $site->customer->name;
                        else 
                            $siteName = '';
                    ?>
                        <td>{{ $siteName }}</td>
                        
                    <td>
                        <a href="{{ url('/itemList' . '/' . $site->customerId) }}" class="btn btn-secondary" 
                            style="font-size:15px; width:100%; height: 100%"> {{ __('機器一覧') }} </a>
                    </td>
                    <td>
                        <a href="{{ url("maintenance/project/user_setu") }}" 
                            class="btn btn-success" style="font-size:15px; width:100%; height: 100%">{{ __('edit') }}</a>
                    </td>
                    <td>
                        
                        {{ Form::open(['action' => ['PortalPageController@deleteSite', $site->id], 'method' => 'POST']) }}
                            <button type="submit" class="btn btn-primary" 
                                onclick="return confirm('Are you sure you want to delete this site?')">{{ 'delete' }}</button>
                        {{ Form::hidden('_method', 'PUT')}}
                        {{ Form::close() }} 
                        {{-- <a href="{{ url("customerList/delete/" . $site->id) }}" 
                            class="btn btn-primary" style="font-size:15px; width:100%; height: 100%">{{ __('delete') }}</a> --}}
                    </td> 
                </tr> 
                @endforeach
        </table>
        <div style="margin-top:-10px; margin-bottom:10px">
            <a href={{ '/' }} class="btn btn-link" 
                style="background-color: #f1f1f1; width: 100px; border: 1px solid black; font-size:15px;">{{ __('バック') }}</a>
        </div>
    </div>

<style>

    .nameHeader {
        text-align:center; 
        width:11%; 
        border: 1px solid black
    }

    .dateTimeHeader {
        text-align:center; 
        width:11%; 
        border: 1px solid black
    }

    .deviceHeader {
        text-align:center; 
        width:6%; 
        border: 1px solid black
    }

    .otherHeader {
        text-align:center; 
        width:2%; 
        border: 1px solid black
    }

    td {
        text-align: center; 
    }

</style>

@endsection