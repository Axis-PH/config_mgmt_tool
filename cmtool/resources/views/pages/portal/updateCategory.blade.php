@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="content">
        <div class="title m-b-md">
            <br>
            <h2>
                Update Category
            </h2>
        </div>
        {{ Form::open(['action' => ['PortalPageController@updateCategory', $categoryId], 'method' => 'POST']) }}
        <div class="form-group">
            Category Name:
            {{Form::text('categoryName', $category->category_name, ['class' => 'form-control', 'placeholder' => 'Category Name'])}}
        </div>
        <a href="{{ url('/categories/delete' . '/' . $category->category_id) }}" class="btn btn-danger">Delete</a>
        {{Form::submit('Update Category', ['class' => 'btn btn-primary'])}}
        <a href={{ redirect()->getUrlGenerator()->previous() }} class="btn btn-link">Cancel</a>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::close() }} 
    </div>
</div>
@endsection
   