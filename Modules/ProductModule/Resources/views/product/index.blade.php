@extends('commonmodule::layouts.main')

@section('content')

    @if(session('message') == 'Product Added Successfully' || session('message') == 'Product Updated Successfully')
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @elseif(session('message') == 'Product Deleted Successfully')
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
    @endif

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Products</h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <a href="{{route('product.create')}}"><button class="btn btn-success">Create Product</button></a>
            <br>
            <br>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Admin</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>


        @if($products)
            <tr>

            @foreach($products as $product)
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    @if($product->photo)
                        <td><img height="100px" width="200px" src="{{$product->photo->path}}"></td>
                    @else
                        <td>{{'user has no photo'}}</td>
                    @endif
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->admin_id}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td> {!! link_to_route('product.edit', $title = "Edit",
                    $parameters = [$product->id], $attributes = ['class' => 'btn btn-info'])!!}
                    {!!  Form::open(['route' =>['product.destroy' , $product->id] , 'method' => 'delete']) !!}
                    @method('DELETE')
                    {!!  Form::submit('Delete!' , ['class' => 'btn btn-danger ']) !!}
                    {!! Form::close() !!}
                    </td>
            </tr>

                            @endforeach
                            @endif
{{--                        <td><span class="label label-success">Approved</span></td>--}}

                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>


@endsection
