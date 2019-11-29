@extends('commonmodule::layouts.main')

@section('content')
    <h1>Hello World</h1>
    <form action="" method="post">
        @csrf
    </form>
    <p>
        This view is loaded from module: {!! config('commonmodule.name') !!}
    </p>
@endsection
