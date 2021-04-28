@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; border:1px solid black; padding: 0px 10px;">
        <h1 style="margin-top:20px; ">{{ __('customer.title') }}</h1>
        <div style="float:left; padding:5px">
            <a href="{{ url("customers/create") }}" class="btn btn-success" 
                style="font-size:15px; width:100px; height: 100%">{{ __('customer.create') }}</a>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead class="thead-dark">
            <tr>
                <th class="idHeader">{{ __('customer.id') }}</th>
                <th class="nameHeader">{{ __('customer.name') }}</th>
                <th class="staffHeader">{{ __('customer.staff') }}</th>
                <th class="telHeader">{{ __('customer.tel') }}</th>
                <th class="mailHeader">{{ __('customer.mail') }}</th>
                <th class="memoHeader">{{ __('customer.memo') }}</th>
                <th class="buttonHeader">{{ __('customer.blank') }}</th>
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
                            class="btn btn-primary" style="font-size:15px; width:90px; height: 100%;">{{ __('customer.update') }}</a>
                    </td>
                </tr> 
                @endforeach
        </table>
        <?php echo $customers->render(); ?>
        <br><br>
        <div style="margin-top:-10px; margin-bottom:10px">
            <a href={{ '/contactLanding' }} class="btn btn-link" 
                style="background-color: #f1f1f1; width: 100px; border: 1px solid black; font-size:15px;">{{ __('customer.back') }}</a>
        </div>
        
    </div>

<style>

    .idHeader {
        text-align:center; 
        border: 1px solid black;
    }

    .nameHeader {
        text-align:center; 
         
        border: 1px solid black;
    }

    .staffHeader {
        text-align:center; 
         
        border: 1px solid black;
    }

    .telHeader {
        text-align:center; 
         
        border: 1px solid black;
    }

    .mailHeader {
        text-align:center; 
        
        border: 1px solid black;
    }

    .memoHeader {
        text-align:center; 
        
        border: 1px solid black;
    }

    .buttonHeader {
        text-align:center; 
         
        border: 1px solid black;
    }

    th,td {
        text-align: center; 
        border: 1px solid black;
        width:400px;
        
    }

    table {
        border: 1px solid black;
        table-layout: fixed;
        width: 100%;
    }


</style>

@endsection