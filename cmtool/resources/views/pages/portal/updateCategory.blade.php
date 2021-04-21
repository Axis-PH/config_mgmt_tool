@extends('layouts.app')

@section('content')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">{{ __('Update Category') }}</h1>
        {{ Form::open(['action' => ['PortalPageController@updateCategory', $categoryId], 'method' => 'POST']) }}
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('Category Name: ') }}</label>
                {{Form::text('categoryName', $category->category_name, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control', 'placeholder' => __('Category Name')])}}
            </div>    
            <br><br><br>
            
        <div style="display:flex; float:right; margin-right:120px; margin-bottom:20px">
            <a href="{{ url('/categories/delete' . '/' . $category->category_id) }}" style="margin-right:5px" class="btn btn-danger" 
                onclick="return confirm('Are you sure you want to proceed with the deletion of this category?')">{{ __('Delete') }}</a>
            {{Form::submit(__('Update Category'), ['class' => 'btn btn-primary'])}}
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 

            <a style="margin-left:5px" href={{ redirect()->getUrlGenerator()->previous() }} 
                class="btn btn-secondary">{{ __('Cancel') }}</a>
        </div>
    </div>

<style>
</style>

@endsection