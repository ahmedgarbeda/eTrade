@extends('commonmodule::layouts.main')
@section('content')
<h1>Admin Form</h1>
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
            <h3 class="card-title">Admin</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            @if(empty($admin) || $admin->id == '')
                <form role="form" action="/dashboard/admin" method="POST">
                    @else
                        <form role="form" action="/dashboard/admin/{{$admin->id}}" method="POST">
                            @method('PUT')

                @endif
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" class="form-control" name="name" value="{{($admin->name)?$admin->name:''}}" id="exampleInputPassword1" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{($admin->email)?$admin->email:''}}" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" value="{{($admin->password)?$admin->password:''}}" name="password" id="exampleInputPassword1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" class="form-control" name="address" value="{{($admin->address)?$admin->address:''}}" id="exampleInputPassword1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{($admin->phone)?$admin->phone:''}}" id="exampleInputPassword1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Role</label>
                        <select class="form-control" name="role_id" id="exampleInputPassword1">
                            <option disabled>Select Admin Role</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->role}}</option>
                            @endforeach
                        </select>
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
