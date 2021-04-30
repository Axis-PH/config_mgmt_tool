@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 100%; padding: 0px 10px; border:1px solid black;">
        <h1 style="margin-top:20px; ">{{ __('item.items') }}</h1>
        <div style="float:left; padding:5px">
            <a href="{{ url("/items/create") . '/' . $siteId . '/' . $customerId }}" class="btn btn-success" 
                style="font-size:15px; width:100px; height: 100%">{{ __('item.create') }}</a>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead class="thead-dark">
            <tr>
                <th class="nameHeader">{{ __('item.name') }}</th>
                <th class="dateTimeHeader">{{ __('item.category') }}</th>
                <th class="dateTimeHeader">{{ __('item.customer') }}</th>
                <th class="dateTimeHeader">{{ __('item.maker') }}</th>
                <th class="dateTimeHeader">{{ __('item.details') }}</th>
                <th class="dateTimeHeader"></th>
            </tr>
            </thead>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->itemName }}</td>
                    <td>{{ $item->categoryName }}</td>
                    <td>{{ $item->customerName }}</td>
                    <td>{{ $item->makerName }}</td>
                    <td><a href="{{ url('/items' . '/' . $item->itemId . '/' . 'info') }}" class="btn btn-dark" 
                        style="font-size:15px; width:100%; height: 100%">{{ __('item.display') }}</a></td>
                    <td>
                        <a href="{{ url('/items/edit' . '/' . $siteId . '/' . $customerId  . '/' . $item->itemId) }}" class="btn btn-primary" 
                            style="font-size:15px; width:100%; height: 100%">{{ __('item.update') }}</a>
                    </td>
                </tr> 
                @endforeach
        </table>
        <?php echo $items->render(); ?>
        <br>
        <div style="margin-top:-10px; margin-bottom:10px">
            <a href={{ '/sites' }} class="btn btn-link" 
                style="background-color: #f1f1f1; width: 100px; border: 1px solid black; font-size:15px;">{{ __('item.back') }}</a>
        </div>
    </div>

<style>

    .nameHeader {
        text-align:center; 
        width:5%; 
        border: 1px solid black
    }

    .dateTimeHeader {
        text-align:center; 
        width:5%; 
        border: 1px solid black
    }

    td {
        text-align: center; 
    }

</style>

@endsection