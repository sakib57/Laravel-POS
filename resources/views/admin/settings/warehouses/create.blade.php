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
                          <a href="{{route('warehouses.index')}}" class="btn btn-primary" style="float: right;"><i class="fa fa-eye"></i>View Warehouses</a>
                          <h3 class="tile-title">Add New Warehouses Here</h3>
                          <div class="tile-body">
                            <form class="form-horizontal" method="post" action="{{route('warehouses.store')}}">
                              @csrf
                              

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Warehouse Code</label>
                                    <div class="col-md-8">
                                    <input name="warehouse_code" class="form-control" type="text" placeholder="Warehouse Code">
                                    <input name="fk_company_id" type="hidden" value="{{$company_id_session }}">
                                    <input name="user_id" type="hidden" value="{{$user_id_session }}">
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label class="control-label col-md-3">Warehouse Name</label>
                                    <div class="col-md-8">
                                    <input name="warehouse_name" class="form-control" type="text" placeholder="Warehouse Name">
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Address</label>
                                    <div class="col-md-8">
                                      <textarea class="form-control" name="address" rows="5" type="text" placeholder="Address"></textarea>
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="control-label col-md-3">City</label>
                                    <div class="col-md-8">
                                    <input name="city" class="form-control" type="text" placeholder="City">
                                    </div>
                              </div>
                              <div class="tile-footer">
                            <div class="row">
                              <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Warehouse</button>
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