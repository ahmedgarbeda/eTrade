@extends('commonmodule::layouts.main')

@section('content')

    <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h3 class="card-title" style="display: inline">Users</h3>
              
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
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
    
                    @foreach ($users as $user )
                    <tr>
                      <td>{{($user->id)?$user->id:''}}</td>
                      <td>{{($user->name)?$user->name:''}}</td>
                      <td>{{($user->email)?$user->email:''}}</td>
                      <td>{{($user->phone)?$user->phone:''}}</td>
                    <td>
                        @if($user->status == 1)
                            {{'Approved'}}
                        @else
                            <a href="/dashboard/users/{{$user->id}}/approve" class="btn btn-info">Approve</a>
                        @endif
                        </td>
                      <td>
                      <a class="btn btn-primary" href="/dashboard/users/{{ $user->id }}/edit">
                          <i class="fas fa-edit"></i>
                        </a>                   
      
                        <form action="/dashboard/users/{{$user->id}}" method="post" style="display: inline">
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