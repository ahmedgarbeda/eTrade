@extends('commonmodule::layouts.main')

@section('content')
    


    <div class="row justify-content-center mt-4 mr-5">
            <div class="col-lg-9">
            <div class="col-xs-12">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Contact Data</h3>
          
                        <div class="box-tools">
                          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
          
                            <div class="input-group-btn">
                              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <tbody><tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                          @foreach ($contacts as $contact )
                            <tr>
                              <td>{{$contact['id']}}</td>
                              <td>{{$contact['email']}}</td>
                              <td>{{$contact['title']}}</td>
                              <td><span 
                                  @if ($contact['status']=='approved')
                                      {!! "class='label label-success'" !!}
                                      
                                  @else
                                    @if ($contact['status']=='denied')
                                    {!! "class='label label-danger'" !!}
                                    @else
                                    {!!  "class='label label-warning'" !!} 
                                    @endif
                                  
                                  @endif

                                  
                              >{{$contact['status']}}</span></td>
                              <td>
                                <a href="{{route('contact.edit',$contact->id)}}" class="btn btn-primary">Edit</a>
                                <form action={{route('contact.destroy',$contact['id'])}} method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">  
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody></table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                </div>

                  <!----->
     
    </div>
<div class="row justify-content-center">
  <div class="col-lg-6 ">
    <div class="box-header with-border">
      <h3 class="box-title">Reply Form</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form action="{{route('contact.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="email">To</label>
          <input type="email" class="form-control" name="email" placeholder="example@etrade.com">
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" placeholder="Enter your title here.">
        </div>
        {{-- <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" rows="3" name="status" placeholder="Your comment">
        </div> --}}
        <select class="custom-select" name="status">
          <option selected>Select Status</option>
          <option value="approve">Approved</option>
          <option value="denied">Denied</option>
          <option value="pending">Pending</option>
        </select>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="contactSubmit" id="contactSubmit">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection