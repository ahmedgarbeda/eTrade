@extends('commonmodule::layouts.main')

@section('content')
    <h1>Website Settings</h1>
    
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Settings</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="" method="POST">
                @csrf
            <div class="card-body">
                    <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Address">
                          </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="number" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                        <label for="exampleInputPassword1">youtube</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                      </div>
                      <div class="form-group">
                            <label for="exampleInputPassword1">Facebook</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                          </div>

                          <div class="form-group">
                                <label for="exampleInputPassword1">Twitter</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                              </div>
                              <div class="form-group">
                                    <label for="exampleInputPassword1">About Us</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                                  </div>
              
              <div class="form-group">
                <label for="exampleInputFile">About Photo</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  
                </div>
              </div>


              <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div>
              
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
       
      </div>
    
@endsection
