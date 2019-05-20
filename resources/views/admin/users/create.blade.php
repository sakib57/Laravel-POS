@extends('admin.master')
@section('content')

<main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-edit"></i> Add User</h1>
            <p>Create User Form</p>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item"><a href="#">Add User</a></li>
          </ul>
        </div>
        <div class="row">
                <div class="col-md-12">
                        <div class="tile">
                          <h3 class="tile-title">User Add Here</h3>
                          <div class="tile-body">
                            <form class="form-horizontal">
                              <div class="form-group row">
                                    <label class="control-label col-md-3">User Name</label>
                                    <div class="col-md-8">
                                    <input name="UserName" class="form-control" type="text" placeholder="Enter User name">
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="control-label col-md-3">User Phone</label>
                                    <div class="col-md-8">
                                        <input name="UserPhone" class="form-control" type="text" placeholder="Enter User phone">
                                    </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-md-3">User Email</label>
                                <div class="col-md-8">
                                  <input class="form-control col-md-8" type="email" placeholder="Enter User email address">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-md-3">User Address</label>
                                <div class="col-md-8">
                                  <textarea class="form-control" rows="4" placeholder="Enter User address"></textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-md-3">User Photo</label>
                                <div class="col-md-8">
                                  <input class="form-control" type="file">
                                </div>
                              </div>
                              
                            </form>
                          </div>
                          <div class="tile-footer">
                            <div class="row">
                              <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
        </div>
</main>
        @endsection