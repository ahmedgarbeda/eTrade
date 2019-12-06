@extends('commonmodule::layouts.main')
@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6 ">
          <div class="box-header with-border">
            <h3 class="box-title">Add Item</h3>
          </div>
        <div class="box-body">
          <form action="{{route('slider.update',$sliders['id'])}}" enctype="multipart/form-data" method="PUT">
            @csrf
              
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control"  name="title" id="title" placeholder="Television,Cooker ..etc" value="{{$sliders['title']}}">
              </div>
              
              <div class="custom-file">
                <input type="file" class="file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file...</label>
              </div>

              <div class="form-group">
                <label for="description">Description</label>
              <textarea class="form-control" name="description" id="description" rows="3" >{{$sliders['description']}}</textarea>
              </div>

              <div class="form-group">
                <button class="btn btn-primary" >Save</button>
              </div>
              
            </form>
        </div>
  </div>
</div>
@endsection