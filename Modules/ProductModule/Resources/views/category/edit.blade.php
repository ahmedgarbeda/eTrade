@extends('commonmodule::layouts.main')



@section('content')



    <h3>Categories</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">

        <div class="col-sm-6">

            {!!  Form::model($category ,['route' => ['category.update' , $category->id ], 'method' => 'PUT']) !!}
            @method('PUT')
            {!!  Form::label('name', 'Name')  !!}
            {!!  Form::text('name' , null ,['class'=> 'form-control']) !!}

            <br>

            {!!  Form::submit('Edit Category!' , ['class' => 'btn btn-info   ']) !!}

            {!! Form::close() !!}


        </div>

    </div>
    <br>
    <div class="row">

        <div class="col-sm-6">
            {!!  Form::open(['route' =>['category.destroy' , $category->id] , 'method' => 'delete']) !!}
            @method('DELETE')
            {!!  Form::submit('Delete Category!' , ['class' => 'btn btn-danger col-sm-4  ']) !!}
            {!! Form::close() !!}
        </div>

    </div>
@endsection
