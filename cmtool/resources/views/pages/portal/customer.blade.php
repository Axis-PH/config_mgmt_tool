@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 100%; border:1px solid black; padding: 0px 10px;">
        <h1 style="margin-top:20px; ">{{ __('customer.title') }}</h1>
        <div style="float:left; padding:5px">
            <a href="{{ url("customers/create") }}" class="btn btn-success" 
                style="font-size:15px; width:100px; height: 100%">{{ __('customer.create') }}</a>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead class="thead-dark">
            <tr>
                <th class="nameHeader">{{ __('customer.id') }}</th>
                <th class="nameHeader">{{ __('customer.name') }}</th>
                <th class="nameHeader">{{ __('customer.staff') }}</th>
                <th class="otherHeader">{{ __('customer.tel') }}</th>
                <th class="otherHeader">{{ __('customer.mail') }}</th>
                <th class="otherHeader">{{ __('customer.memo') }}</th>
                <th class="otherHeader">{{ __('customer.blank') }}</th>
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
                            class="btn btn-primary" style="font-size:15px; width:100%; height: 100%;">{{ __('customer.update') }}</a>
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

    .nameHeader {
        text-align:center; 
        width:16.5%; 
        border: 1px solid black
    }

    .otherHeader {
        text-align:center; 
        width:16.5%; 
        border: 1px solid black
    }

    td {
        text-align: center; 
    }

</style>

@endsection