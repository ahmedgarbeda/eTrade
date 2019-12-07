@extends('commonmodule::layouts.main')


@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="display: inline">Admins</h3>
                <a href="/dashboard/admin/create" class="btn btn-primary pull-right">Add Admin</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($admins as $admin)
                    <tr>
                        <td>{{$admin->id}}</td>
                        <td>{{($admin->name)?$admin->name:''}}</td>
                        <td>{{($admin->email)?$admin->email:''}}</td>
                        <td>{{($admin->phone)?$admin->phone:''}}</td>
                        <td>{{($admin->role->role)?$admin->role->role:''}}</td>
                        <td>
                            <a href="/dashboard/admin/{{$admin->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <form action="/dashboard/admin/{{$admin->id}}" method="post" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
