@extends('commonmodule::layouts.main')



    <div class="row justify-content-end mt-4 mr-5">
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
                          <tr>
                            <td>183</td>
                            <td>Ahmed Rizk</td>
                            <td>Main Admin</td>
                            <td><span class="label label-success">Approved</span></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="submit" class="btn btn-Danger">Delete</button>
                            </td>
                          </tr>
                          <tr>
                            <td>219</td>
                            <td>Steven Ragy</td>
                            <td>Main Admin</td>
                            <td><span class="label label-warning">Pending</span></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="submit" class="btn btn-Danger">Delete</button>
                            </td>
                          </tr>
                          <tr>
                            <td>657</td>
                            <td>Mahmoud Hassan</td>
                            <td>Order Admin</td>
                            <td><span class="label label-success">Approved</span></td>
                            <<td>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="submit" class="btn btn-Danger">Delete</button>
                            </td>
                          </tr>
                          <tr>
                            <td>175</td>
                            <td>Ahmed Shrief</td>
                            <td>Product Admin</td>
                            <td><span class="label label-danger">Denied</span></td>
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
              <h3 class="box-title">Reply Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>To</label>
                  <input type="email" class="form-control" placeholder="example@etrade.com">
                </div>
                <div class="form-group">
                        <label>Titele</label>
                        <input type="text" class="form-control" placeholder="Enter your title here.">
                      </div>

                <!-- textarea -->
                <div class="form-group">
                    <label>Textarea</label>
                    <textarea class="form-control" rows="3" placeholder="Your comment"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="contactSubmit" id="contactSubmit">Send</button>
                 </div>
                
              </form>
            </div>
        </div>
            <!-- /.box-body -->
          </div>