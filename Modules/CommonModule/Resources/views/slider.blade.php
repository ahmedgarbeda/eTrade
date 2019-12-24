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
          <h3 class="card-title" style="display: inline">Slider</h3>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add New Slide
        </button>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
          <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($sliders as $slider )
                <tr>
                <td>{{$slider->id}}</td>
                 <td>{{$slider->title}}</td>
                 <td>{{$slider->description}}</td>
                <td><span><img src="{{ URL::to('/') }}/images/{{$slider->image}}" w class="img-fluid" alt="Responsive image" width="100" height="100"></span></td>
                 <td>
                  <button type="button" class="btn btn-primary" onclick="getRole({{$slider->id}})" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-edit"></i>
                </button>                   

                   <form action="/dashboard/slider/{{$slider->id}}" method="post" style="display: inline">
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
            <form action="/dashboard/slider" id="myform" enctype="multipart/form-data" method="POST">
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
</div>
@endsection

<script>
  function getRole(id){
      $.ajax({
          method:"get",
          url:"/dashboard/slider/"+id+"/edit",
          success:function (data) {
              $('#title').val(data.title);
              $('#description').val(data.description);
              $('#myform').attr('action','/dashboard/slider/'+id);
              $('#myform').append('@method("put")')
          }
      })
  }
</script>
