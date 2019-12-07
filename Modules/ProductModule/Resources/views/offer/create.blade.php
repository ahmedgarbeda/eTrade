@extends('commonmodule::layouts.main')

@section('content')
    <h1>Create Offer</h1>
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

        {!!  Form::open(['route' => ['offer.store'], 'method' => 'post' ]) !!}

        <div class="form-group">
            {!!  Form::label('name', 'Offer Name')  !!}
            {!!  Form::text('offer_name' , null ,['class'=> 'form-control']) !!}
        </div>


        <div class="form-group">
            {!!  Form::label('category_id', 'Category')  !!}
            {!!  Form::select('category_id' , [''=>'select option'] + $categories  , 0 ,['class'=> 'form-control']) !!}
        </div>

        <div class="form-group">
            {!!  Form::label('product', 'Product')  !!}
            {!!  Form::select('product_id' , [''=>'select option'] + $products , 0 ,['class'=> 'form-control']) !!}
        </div>

        <div class="form-group">
            {!!  Form::label('end date', 'Start date')  !!}
            {!!  Form::date('start_date' , \Carbon\Carbon::now() ,['class'=> 'form-control']) !!}
        </div>
        <div class="form-group">
            {!!  Form::label('end date', 'End date')  !!}
            {!!  Form::date('end_date' , \Carbon\Carbon::now() ,['class'=> 'form-control']) !!}
        </div>

        {!!  Form::submit('Create offer!' , ['class' => 'btn btn-success   ']) !!}


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
