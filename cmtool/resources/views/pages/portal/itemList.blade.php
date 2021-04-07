@extends('layouts.app')

@section('content')
{{-- @include('includes.messages') --}}
    <div style="display: inline-block; width: 600px; border:1px solid black;">
        <h1 style="margin-top:20px; ">ITEM LIST</h1>
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