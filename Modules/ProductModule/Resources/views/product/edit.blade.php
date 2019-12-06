@extends('commonmodule::layouts.main')

@section('content')

    <h1>Edit Product</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="box-body">

        {!!  Form::model($product,['route' => ['product.update' , $product->id], 'method' => 'put' , 'files' => true  ]) !!}
        @method('put')
        <div class="form-group">
            {!!  Form::label('name', 'Name')  !!}
            {!!  Form::text('name' , null ,['class'=> 'form-control']) !!}
        </div>

        <div class="form-group">
            {!!  Form::label('description', 'Description')  !!}
            {!!  Form::textarea('description' , null ,['class'=> 'form-control' , 'rows' => '4']) !!}
        </div>

        <div class="form-group">
            {!!  Form::label('price', 'Price')  !!}
            {!!  Form::text('price' , null ,['class'=> 'form-control' , 'rows' => '3']) !!}
        </div>


        <div class="form-group">
            {!!  Form::label('category_id', 'Category')  !!}
            {!!  Form::select('category_id' ,  $categories  , 0 ,['class'=> 'form-control']) !!}
        </div>

        <div class="form-group">
            {!!  Form::label('admin_id', 'Admin')  !!}
            {!!  Form::select('admin_id' ,  $admins  , 0 ,['class'=> 'form-control']) !!}
        </div>

        <div class="form-group">
            {!!  Form::label('photo', 'Photo')  !!}
            {!!  Form::file('photo'  ,['class'=> 'form-control']) !!}
        </div>

        {!!  Form::submit('Update Product!' , ['class' => 'btn btn-info   ']) !!}


        {!! Form::close() !!}

    </div>

    {{--    <div class="box-body">--}}
    {{--        <div class="form-group">--}}
    {{--            <label for="exampleInputEmail1">Email address</label>--}}
    {{--            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">--}}
    {{--        </div>--}}
    {{--        <div class="form-group">--}}
    {{--            <label for="exampleInputPassword1">Password</label>--}}
    {{--            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
    {{--        </div>--}}
    {{--        <div class="form-group">--}}
    {{--            <label for="exampleInputFile">File input</label>--}}
    {{--            <input type="file" id="exampleInputFile">--}}

    {{--            <p class="help-block">Example block-level help text here.</p>--}}
    {{--        </div>--}}
    {{--        <div class="checkbox">--}}
    {{--            <label>--}}
    {{--                <input type="checkbox"> Check me out--}}
    {{--            </label>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
