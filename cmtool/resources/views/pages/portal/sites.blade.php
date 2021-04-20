@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">Sites</h1>
        {{-- <h1 style="margin-top:20px; ">保守先一覧</h1> --}}
        <div style="float:left; padding:5px">
            <a href="{{ url("sites/create") }}" class="btn btn-success" 
                style="font-size:15px; width:100px; height: 100%">{{ __('Create') }}</a>
        </div>
        <table style="width:800px" class="table table-bordered table-striped table-responsive">
            <thead style="width:800px"class="thead-dark">
            <tr>
                {{-- <th class="nameHeader">{{ __('拠点名') }}</th> --}}
                <th class="nameHeader">{{ __('site.siteName') }}</th>
                {{-- <th class="dateTimeHeader">{{ __('顧客名') }}</th> --}}
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
                            $customer_name = '';
                    ?>
                        <td>{{ $customer_name }}</td>
                        
                    <td>
                        <a href="{{ url('/itemList' . '/' . $site->customerId) }}" class="btn btn-dark" 
                            style="font-size:15px; width:100%; height: 100%"> {{ __('機器一覧') }} </a>
                    </td>
                    <td>
                        <a href="{{ url("sites/update/" . $site->site_id) }}" 
                            class="btn btn-primary" style="font-size:15px; width:100%; height: 100%">{{ __('edit') }}</a>
                    </td>
                </tr> 
                @endforeach
        </table>
        <?php echo $sites->render(); ?>
        <br><br>
        <div style="margin-top:-10px; margin-bottom:10px">
            <a href={{ '/' }} class="btn btn-link" 
                style="background-color: #f1f1f1; width: 100px; border: 1px solid black; font-size:15px;">{{ __('バック') }}</a>
        </div>
    </div>

<style>

    .nameHeader {
        text-align:center; 
        width:20%; 
        border: 1px solid black
    }

    .buttonHeader {
        text-align:center; 
        width:10%; 
        border: 1px solid black
    }

    td {
        text-align: center; 
    }

</style>

@endsection