@extends('commonmodule::layouts.main')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6 ">
      <div class="box-header with-border">
        <h3 class="box-title">Reply Form</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form action={{route('contact.update',$contacts['id'])}} method="post">
          @csrf
          <input name="_method" type="hidden" value="PUT">
          <div class="form-group">
            <label for="email">To</label>
            <input type="email" class="form-control" name="email" placeholder="example@etrade.com" value="{{$contacts['email']}}">
          </div>
          
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter your title here."  value="{{$contacts['title']}}">
          </div>
        
          <select class="custom-select" name="status">
            <option selected> {{$contacts['status']}}</option>
            <option value="approve">Approved</option>
            <option value="denied">Denied</option>
            <option value="pending">Pending</option>
          </select>
          <div class="form-group">
              <button class="btn btn-primary">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection