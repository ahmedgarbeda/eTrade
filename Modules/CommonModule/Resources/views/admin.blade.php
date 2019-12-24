@extends('commonmodule::layouts.main')

<div class="row justify-content-end mt-4 mr-5">
    <div class="col-lg-9">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Admin</h3>

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
                            <th>Email</th>
                            <th>Phone#</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Ahmed Rizk</td>
                            <td>ahmed_rizk@etrade.com</td>
                            <td>01234567891</td>
                            <td>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="submit" class="btn btn-Danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Steven Ragy</td>
                            <td>stevenragy@etrade.com</td>
                            <td>01234567892</td>
                            <td>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="submit" class="btn btn-Danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Ahmed Shrief</td>
                            <td>ahmed_shrief@etrade.com</td>
                            <td>01234567893</td>
                            <td>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="submit" class="btn btn-Danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ahmed Rizk</td>
                            <td>ahmed_rizk@etrade.com</td>
                            <td>01234567891</td>
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

