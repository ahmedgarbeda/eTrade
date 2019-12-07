use
@extends('commonmodule::layouts.main')


@section('content')
    

<div class="row justify-content-center mt-4 mr-5">
  <div class="col-lg-9">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Recorded Items</h3>
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
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                
               
               @foreach ($sliders as $slider )
               <tr>
               <td>{{$slider->id}}</td>
                <td>{{$slider->title}}</td>
                <td>{{$slider->description}}</td>
               <td><span><img src="/storage/{{$slider->image}}" w class="img-fluid" alt="Responsive image" width="100" height="100"></span></td>
                <td>
                  <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-primary">Edit</a>
                  <form action={{route('slider.destroy',$slider['id'])}} method="post">
                      @csrf
                      <input name="_method" type="hidden" value="DELETE">  
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
               @endforeach 
                
                 
              </tbody></table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row justify-content-center">
          <div class="col-lg-6 ">
              <div class="box-header with-border">
                <h3 class="box-title">Add Item</h3>
              </div>
              <div class="box-body">
                <form action="{{route('slider.store')}}" enctype="multipart/form-data" method="POST">
                  @csrf
                    
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control"  name="title" id="title" placeholder="Television,Cooker ..etc" value="{{old('title')}}">
                      @error('title')
                        <span class="invalid-feedback" role="alert">
                          <h1>{{ $message }}</h1>
                        </span>
                      @enderror
                    </div>
                    
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                      <label class="custom-file-label" for="image">Choose file...</label>
                      @error('image')
                        <span class="invalid-feedback" role="alert">
                          <h1>{{ $message }}</h1>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" name="description" id="description" rows="3" placeholder="Your comment"></textarea>
                      @error('description')
                        <span class="invalid-feedback" role="alert">
                          <h1>{{ $message }}</h1>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary" >Save</button>
                    </div>
                    
                  </form>
              </div>
          </div>
         
</div>
@endsection