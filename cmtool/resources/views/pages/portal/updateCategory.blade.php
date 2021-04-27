@extends('layouts.app')

@section('content')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">{{ __('category.updateCategory') }}</h1>
        {{ Form::open(['action' => ['PortalPageController@updateCategory', $categoryId], 'method' => 'POST']) }}
            <div>
                <label style="margin-left:50px; margin-top:5px; float:left;">{{ __('category.name') }}</label>
                {{Form::text('categoryName', $category->category_name, ['style' => 'float:right; width:500px; margin-right: 120px', 
                    'class' => 'form-control' , 'placeholder' => __('category.placeholder')])}}
            </div>    
            <br><br><br>
            
        <div style="display:flex; float:right; margin-right:120px; margin-bottom:20px">
            {{Form::submit(__('category.update'), ['class' => 'btn btn-primary'])}}
            <a href="{{ url('/categories/delete' . '/' . $category->category_id) }}" style="margin-left:5px" class="btn btn-danger" 
                onclick="return confirm('<?php echo(__('category.deleteMessage'));?>')">{{ __('category.delete') }}</a>
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::close() }} 

            <a style="margin-left:5px" href={{ '/categories' }} 
                class="btn btn-secondary">{{ __('category.cancel') }}</a>
        </div>
    </div>

<style>
</style>

@endsection