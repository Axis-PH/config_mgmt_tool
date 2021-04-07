@extends('layouts.app')

@section('content')
{{-- @include('includes.messages') --}}
    <div style="display: inline-block; width: 600px; border:1px solid black;">
        <h1 style="margin-top:20px; ">保守先一覧</h1>
        {{-- <h1 style="margin-top:20px; ">Customer List</h1> --}}
        {{-- <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 col-sm-8 pull-left">
                <div class="card-body row justify-content-center" >
                    <div class="form-group row justify-content-center" style="width:100%;padding-top:15px">
                        <div class="col-md-7" style="padding:5px">
                            <a href="{{ url("/portal") }}" class="btn btn-primary" 
                                style="font-size:20px; width:100%; height: 100%"> {{ __('Maintenance Destination List') }} </a>
                        </div>
                        <div class="col-md-7" style="padding:5px">
                            <a href="{{ url('/admin') }}" class="btn btn-primary" 
                                style="font-size:20px; width:100%; height: 100%"> {{ __('Contact List') }} </a>
                        </div>
                        <div class="col-md-7" style="padding:5px">
                            <a href="{{ url('/') }}" class="btn btn-primary" 
                                style="font-size:20px; width:100%; height: 100%"> {{ __('Main Menu') }} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <table class="table table-bordered table-striped table-responsive">
            <thead class="thead-dark">
            <tr>
                <th class="nameHeader">{{ __('拠点名') }}</th>
                <th class="dateTimeHeader">{{ __('顧客名') }}</th>
                <th class="dateTimeHeader"></th>
            </tr>
            </thead>
                @foreach ($bases as $base)
                <tr>
                    <td>{{$base->customer->name}}</td>
                    <td>{{ $base->customer->namePIC }}</td>
                    <td>
                        <a href="{{ url('/itemList') }}" class="btn btn-primary" 
                            style="font-size:20px; width:100%; height: 100%"> {{ __('機器一覧') }} </a>
                    </td>
                </tr> 
                @endforeach
        </table>
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