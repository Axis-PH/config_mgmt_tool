@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; padding: 0px 10px; border:1px solid black;">
        <h1 style="margin-top:20px; ">{{ __('site.sites') }}</h1>
        {{-- <h1 style="margin-top:20px; ">保守先一覧</h1> --}}
        <div style="float:left; padding:5px">
            <a href="{{ url("sites/create") }}" class="btn btn-success" 
                style="font-size:15px; width:100px; height: 100%">{{ __('site.create') }}</a>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead class="thead-dark">
            <tr>
                <th class="nameHeader">{{ __('site.siteName') }}</th>
                <th class="nameHeader">{{ __('site.customerName') }}</th>
                <th class="buttonHeader"></th>
                <th class="buttonHeader"></th>
            </tr>
            </thead>
                @foreach ($sites as $site)
                <tr>
                    <td>{{$site->site_name}}</td>

                    <?php 
                        if (!empty($site->customer->customer_name)) 
                            $customer_name = $site->customer->customer_name;
                        else 
                            $customer_name = __('site.missing');
                    ?>
                        <td>{{ $customer_name }}</td>
                        
                    <td>
                        <a href="{{ url('/items/list' . '/' . $site->site_id . '/' . $site->customer_id) }}" class="btn btn-dark" 
                            style="font-size:15px; width:100%; height: 100%"> {{ __('site.itemList') }} </a>
                    </td>
                    <td>
                        <a href="{{ url("sites/update/" . $site->site_id) }}" 
                            class="btn btn-primary" style="font-size:15px; width:100%; height: 100%">{{ __('site.update') }}</a>
                    </td>
                </tr> 
                @endforeach
        </table>
        <?php echo $sites->render(); ?>
        <br><br>
        <div style="margin-top:-10px; margin-bottom:10px">
            <a href={{ '/' }} class="btn btn-link" 
                style="background-color: #f1f1f1; width: 100px; border: 1px solid black; font-size:15px;">{{ __('site.back') }}</a>
        </div>
    </div>

<style>

    .nameHeader {
        text-align:center; 
        width:350px; 
        border: 1px solid black
    }

    .buttonHeader {
        text-align:center; 
        width:150px; 
        border: 1px solid black
    }

    td {
        text-align: center; 
    }

</style>

@endsection