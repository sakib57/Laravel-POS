@extends('admin.master')
@section('content')

<main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-edit"></i> Add Company</h1>
            <p>Create Company Form</p>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Companies</li>
            <li class="breadcrumb-item"><a href="#">Add Company</a></li>
          </ul>
        </div>
        <div class="row">
                <div class="col-md-12">

                        @if($errors->any())
                            <div class="alert-danger">
                                <ul class="list-unstyled">
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                              @csrf
                            <div class="tile">
                          <h3 class="tile-title">Company Add Here</h3>
                          <div class="tile-body">
                              <div class="form-group row">
                                    <label class="control-label col-md-3">Company Name</label>
                                    <div class="col-md-8">
                                    <input name="name" value="{{ old('name') }}" class="form-control" type="text" placeholder="Enter company name">
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="control-label col-md-3">Company Phone</label>
                                    <div class="col-md-8">
                                        <input name="phone" value="{{ old('phone') }}" class="form-control" type="text" placeholder="Enter company phone">
                                    </div>
                              </div>
                              <div class="form-group row">
                                  <label class="control-label col-md-3">Company Email</label>
                                  <div class="col-md-8">
                                    <input name="email" value="{{ old('email') }}" class="form-control col-md-8" type="email" placeholder="Enter company email address">
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Company Website</label>
                                    <div class="col-md-8">
                                      <input name="website" value="{{ old('website') }}" class="form-control col-md-8" type="text" placeholder="Enter company website address">
                                    </div>
                                  </div>
                                    
                              <div class="form-group row">
                                <label class="control-label col-md-3">Company Address</label>
                                <div class="col-md-8">
                                  <textarea name="address" class="form-control" rows="4" placeholder="Enter company address">{{ old('address') }}</textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-md-3">Company Logo</label>
                                <div class="col-md-8">
                                  <input name="company_logo" class="form-control" type="file">
                                </div>
                              </div>
                              
                          </div>
                          <div class="tile-footer">
                            <div class="row">
                              <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                      </div>
        </div>
</main>
        @endsection