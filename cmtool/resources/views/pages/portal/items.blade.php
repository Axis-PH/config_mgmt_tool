@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 900px; border:1px solid black;">
        {{-- <h1 style="margin-top:20px; ">Item List</h1> --}}
        <h1 style="margin-top:20px; ">機器一覧</h1>
        <div style="float:left; padding:5px">
            <a href="{{ url("/items/create") . '/' . $siteId . '/' . $customerId }}" class="btn btn-success" 
                style="font-size:15px; width:100px; height: 100%">{{ __('Add Item') }}</a>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead class="thead-dark">
            <tr>
                {{-- <th class="nameHeader">{{ __('name') }}</th>
                <th class="dateTimeHeader">{{ __('equipmentClassId') }}</th>
                <th class="dateTimeHeader">{{ __('customerId') }}</th>
                <th class="dateTimeHeader">{{ __('makerId') }}</th>
                <th class="dateTimeHeader">{{ __('info') }}</th>
                <th class="dateTimeHeader"></th> --}}
                <th class="nameHeader">Item Name</th>
                <th class="dateTimeHeader">Item Category</th>
                <th class="dateTimeHeader">Customer Name</th>
                <th class="dateTimeHeader">Maker</th>
                <th class="dateTimeHeader">Details</th>
                <th class="dateTimeHeader"></th>
            </tr>
            </thead>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->customer_id }}</td>
                    <td>{{ $item->maker_id }}</td>
                    <td><a href="{{ url('/items' . '/' . $item->item_id . '/' . 'info') }}" class="btn btn-primary" 
                        style="font-size:15px; width:100%; height: 100%">Display</a></td>
                    <td>
                        <a href="{{ url('/items/edit' . '/' . $siteId . '/' . $customerId  . '/' . $item->item_id) }}" class="btn btn-success" 
                            style="font-size:15px; width:100%; height: 100%">Edit</a>
                    </td>
                </tr> 
                @endforeach
        </table>
        <div style="margin-top:-10px; margin-bottom:10px">
            <a href={{ '/sites' }} class="btn btn-link" 
                style="background-color: #f1f1f1; width: 100px; border: 1px solid black; font-size:15px;">戻る</a>
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

    td {
        text-align: center; 
    }

</style>

@endsection