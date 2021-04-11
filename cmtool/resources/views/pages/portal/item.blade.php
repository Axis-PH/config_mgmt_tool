@extends('layouts.app')

@section('content')
{{-- @include('includes.messages') --}}
    <div style="display: inline-block; width: 600px; border:1px solid black;">
        <h1 style="margin-top:20px; ">Item {{ $equipment->id }} </h1>
        <table class="table table-bordered table-striped table-responsive">
            <thead class="thead-dark">
            <tr>
                <th class="nameHeader">{{ __('拠点名') }}</th>
                <th class="dateTimeHeader">{{ __('顧客名') }}</th>
                <th class="dateTimeHeader"></th>
            </tr>
            </thead>
                {{-- @foreach ($bases as $base)
                <tr>
                    <td>{{$base->name}}</td>
                    <td>{{ $base->customer->name }}</td>
                    <td>
                        <a href="{{ url('/itemList') }}" class="btn btn-primary" 
                            style="font-size:20px; width:100%; height: 100%"> {{ __('機器一覧') }} </a>
                    </td>
                </tr> 
                @endforeach --}}
        </table>
        <div style="margin-top:-10px; margin-bottom:10px">
            <a href={{ '/customerList' }} class="btn btn-link" 
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

    td {
        text-align: center; 
    }

</style>

@endsection