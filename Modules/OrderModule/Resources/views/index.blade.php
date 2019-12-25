@extends('commonmodule::layouts.main')

@section('content')

    <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h3 class="card-title" style="display: inline">New Orders</h3>
              
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>user</th>
                      <th>Address</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($newOrders)
                    @foreach ($newOrders as $order )
                    <tr>
                      <td>{{$order->id}}</td>
                      <td>{{$order->user->name}}</td>
                      <td>{{$order->address}}</td>
                      <td>{{$order->total_price}}</td>
                    <td><a href="/dashboard/order/{{$order->id}}/status/1" class="btn btn-info">Approve</a></td>
                      <td>
      
                        <form action="/dashboard/order/{{$order->id}}" method="post" style="display: inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                      </form>
                      </td>
                   </tr>
                   
                    @endforeach 
                    @endif
                  </tbody>
              </table>
          </div>
          <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="display: inline">confirmed Orders</h3>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>user</th>
                        <th>Address</th>
                        <th>Price</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($confirmed)
                      @foreach ($confirmed as $order )
                      <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->total_price}}</td>
                      <td><a href="/dashboard/order/{{$order->id}}/status/2" class="btn btn-info">ship Order</a></td>
                        
                     </tr>
                     
                      @endforeach 
                      @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="display: inline">Shipping Orders</h3>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>user</th>
                        <th>Address</th>
                        <th>Price</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($shipped)
                      @foreach ($shipped as $order )
                      <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->total_price}}</td>
                      <td><a href="/dashboard/order/{{$order->id}}/status/3" class="btn btn-info">shipped</a></td>
                        
                     </tr>
                     
                      @endforeach 
                      @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>



    @endsection