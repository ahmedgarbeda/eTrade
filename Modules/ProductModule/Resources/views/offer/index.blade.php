@extends('commonmodule::layouts.main')

@section('content')

    @if(session('message') == 'Offer Added Successfully' || session('message') == 'Offer Updated Successfully')
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @elseif(session('message') == 'Offer Deleted Successfully')
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
    @endif

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Offers</h3>

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
            <a href="{{route('offer.create')}}"><button class="btn btn-success">Create Offer</button></a>
            <br>
            <br>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>ID</th>
                        <th>Offer Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>


                    @if($offers)
                        <tr>

                            @foreach($offers as $offer)
                                <td>{{$offer->id}}</td>
                                <td>{{$offer->offer_name}}</td>
                                <td>{{$offer->start_date}}</td>
                                <td>{{$offer->end_date}}</td>
                                <td>{{$offer->product->name}}</td>
                                <td>{{$offer->category->name}}</td>
                                <td>{{$offer->created_at}}</td>
                                <td>{{$offer->updated_at}}</td>
                                <td> {!! link_to_route('offer.edit', $title = "Edit",
                    $parameters = [$offer->id], $attributes = ['class' => 'btn btn-info'])!!}
                                    {!!  Form::open(['route' =>['offer.destroy' , $offer->id] , 'method' => 'delete']) !!}
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
