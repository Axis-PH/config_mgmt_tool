@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="content">
        <div class="title m-b-md">
            <br>
            <h2>
                Create Category
            </h2>
        </div>
        {{ Form::open(['action' => ['PortalPageController@addCategory'], 'method' => 'POST']) }}
            <div class="form-group">
                Category Name:
                {{Form::text('categoryName', '', ['class' => 'form-control'])}}
            </div>
        {{Form::submit('Add Category', ['class' => 'btn btn-primary'])}}
        <a href={{ redirect()->getUrlGenerator()->previous() }} class="btn btn-link">Cancel</a>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::close() }} 
    </div>
</div>
@endsection
   