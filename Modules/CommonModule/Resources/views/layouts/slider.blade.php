@extends('commonmodule::layouts.main')



    <div class="row justify-content-end mt-4 mr-5">
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
                          <tr>
                              <td>1</td>
                              <td>Television</td>
                              <td>Samsung Smart LED</td>
                              <td><span><img src="http://pngtransparent.com/images/television-png-454x311_7fb1b238.png" class="img-fluid" alt="Responsive image" width="100"></span></td>
                              <td>
                                  <button type="submit" class="btn btn-primary">Edit</button>
                                  <button type="submit" class="btn btn-Danger">Delete</button>
                              </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Television</td>
                                <td>Samsung Smart LED</td>
                                <td><span><img src="http://pngtransparent.com/images/television-png-454x311_7fb1b238.png" class="img-fluid" alt="Responsive image" width="100"></span></td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                    <button type="submit" class="btn btn-Danger">Delete</button>
                                </td>
                              </tr>
                              <tr>
                                  <td>1</td>
                                  <td>Television</td>
                                  <td>Samsung Smart LED</td>
                                  <td><span><img src="http://pngtransparent.com/images/television-png-454x311_7fb1b238.png" class="img-fluid" alt="Responsive image" width="100"></span></td>
                                  <td>
                                      <button type="submit" class="btn btn-primary">Edit</button>
                                      <button type="submit" class="btn btn-Danger">Delete</button>
                                  </td>
                                </tr>
                          
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
              <h3 class="box-title">Add Item</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" placeholder="Television,Cooker ..etc">
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                  <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                  <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>

                <!-- textarea -->
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" placeholder="Your comment"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="sliderSubmit" id="sliderSubmit">Save</button>
                 </div>
                
              </form>
            </div>
        </div>
            <!-- /.box-body -->
          </div>