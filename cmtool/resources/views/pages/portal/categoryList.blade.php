@extends('layouts.app')

@section('content')
{{-- @include('includes.messages') --}}
    <div style="display: inline-block; width: 900px; border:1px solid black;">
        {{-- <h1 style="margin-top:20px; ">Item List</h1> --}}
        <h1 style="margin-top:20px; ">Category</h1>
        <div style="float:left; padding:5px">
            <a href="{{ url("/category/add")}}" class="btn btn-success" 
                style="font-size:15px; width:100px; height: 100%">{{ __('Add') }}</a>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead class="thead-dark">
            <tr>
                <th class="nameHeader">機器分類番号</th>
                <th class="dateTimeHeader">機器分類名</th>
                <th class="dateTimeHeader"></th>
                <th class="dateTimeHeader"></th>
            </tr>
            </thead>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->category_id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>
                        <a href="{{ url('/category/edit' . '/' . $category->category_id) }}" class="btn btn-primary" 
                            style="font-size:15px; width:50%; height: 100%">Edit</a>
                    </td>
                    <td>
                        <a href="{{ url('/category/delete' . '/' . $category->category_id) }}" class="btn btn-danger" 
                            style="font-size:15px; width:50%; height: 100%">Delete</a>
                    </td>
                </tr> 
                @endforeach
        </table>
        <div style="margin-top:-10px; margin-bottom:10px">
            <a href={{ '/' }} class="btn btn-link" 
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