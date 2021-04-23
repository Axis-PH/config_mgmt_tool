@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 100%; padding: 0px 10px; border:1px solid black;">
        <h1 style="margin-top:20px; ">{{ __('category.categories') }}</h1>
        <div style="float:left; padding:5px">
            <a href="{{ url("categories/create")}}" class="btn btn-success" 
                style="font-size:15px; width:100px; height: 100%">{{ __('category.add') }}</a>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead class="thead-dark">
            <tr>
                <th class="nameHeader">{{ __('category.number') }}</th>
                <th class="dateTimeHeader">{{ __('category.name') }}</th>
                <th class="dateTimeHeader"></th>
            </tr>
            </thead>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->category_id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>
                        <a href="{{ url('/categories/edit' . '/' . $category->category_id) }}" class="btn btn-success" 
                            style="font-size:15px; width:50%; height: 100%">{{ __('category.update') }}</a>
                    </td>
                </tr> 
                @endforeach
        </table>
        <?php echo $categories->render(); ?>
        <br>
        <div style="margin-top:-10px; margin-bottom:10px">
            <a href={{ '/' }} class="btn btn-link" 
                style="background-color: #f1f1f1; width: 100px; border: 1px solid black; font-size:15px;">{{ __('category.back') }}</a>
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