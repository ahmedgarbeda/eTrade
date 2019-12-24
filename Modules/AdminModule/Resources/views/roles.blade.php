@extends('commonmodule::layouts.main')


@section('content')
<div class="alert-danger">
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
                <h3 class="card-title" style="display: inline">Roles</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add New Role
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{($role->role)?$role->role:''}}</td>

                            <td>
                                <button type="button" class="btn btn-primary" onclick="getRole({{$role->id}})" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="/dashboard/roles/{{$role->id}}" method="post" style="display: inline">
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="/dashboard/roles" id="myform" method="POST">

                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Name</label>
                                        <input type="text" class="form-control" name="role" value="" id="roleField">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                </div>

            </div>
        </div>
    </div>
@endsection

<script>
    function getRole(id){
        $.ajax({
            method:"get",
            url:"/dashboard/roles/"+id+"/edit",
            success:function (data) {
                $('#roleField').val(data.role);
                $('#myform').attr('action','/dashboard/roles/'+id);
                $('#myform').append('@method("put")')
            }
        })
    }
</script>
