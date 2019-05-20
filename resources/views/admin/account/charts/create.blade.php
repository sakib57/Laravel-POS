@extends('admin.master')
@section('content')

<main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-edit"></i> System Settings</h1>
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
                        <div class="tile">
                          <a href="{{route('charts.index')}}" class="btn btn-primary" style="float: right;"><i class="fa fa-eye"></i>View Chart of Account</a>
                          <h3 class="tile-title">Add New Chart of Account Here</h3>
                          <div class="tile-body">
                            <form class="form-horizontal" method="post" action="{{route('charts.store')}}">
                              @csrf

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Head Type</label>
                                    <div class="col-md-8">
                                    <select name="head_type" class="form-control" type="text" >
                                      <option value="">--Select Head Type--</option>
                                      <option value="0">Income</option>
                                      <option value="1">Expance</option>
                                    </select>
                                    <input type="hidden" name="company_id" value="{{$company_id_session }}">
                                    <input type="hidden" name="user_id" value="{{$user_id_session }}">
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="control-label col-md-3">Head Name</label>
                                    <div class="col-md-8">
                                    <input name="head_name" class="form-control" type="text" placeholder="Head Name">
                                    </div>
                              </div>

                              <div class="form-group row">
                                  <label class="control-label col-md-3">Status</label>
                                  <div class="col-md-8">
                                      <div class="animated-radio-button">
                                          <label>
                                            <input type="radio" value="1" name="status" checked=""><span class="label-text">Active</span>
                                          </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <label>
                                            <input type="radio" value="0" name="status"><span class="label-text">Inactive</span>
                                          </label>
                                        </div>
                                  </div>
                              </div>

                              

                              <div class="tile-footer">
                            <div class="row">
                              <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Chart of Account</button>
                              </div>
                            </div>
                          </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
        </div>
</main>

  <script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
    <script  src="{{ asset('assets/admin/js/plugins/select2.min.js')}}"></script>


<script type="text/javascript">
  $('.select2').select2();
</script>
        @endsection