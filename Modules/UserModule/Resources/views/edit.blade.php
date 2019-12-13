@extends('commonmodule::layouts.main')
@section('content')
<h1>Users Form</h1>
<div class="danger">
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    @endif
</div>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <form role="form" action="/dashboard/users/{{$user->id}}" method="POST">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" class="form-control" name="name" value="{{($user->name)?$user->name:''}}" id="exampleInputPassword1" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{($user->email)?$user->email:''}}" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" value="" name="password" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Governrate</label>
                        <select class="form-control" name="governrate_id" id="exampleInputPassword1">
                            <option disabled>Select Governorate</option>
                            @foreach($govs as $gov)
                                <option value="{{$gov->id}}">{{$gov->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" class="form-control" name="address" value="{{($user->address)?$user->address:''}}" id="exampleInputPassword1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{($user->phone)?$user->phone:''}}" id="exampleInputPassword1" placeholder="">
                    </div>
                    

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection
