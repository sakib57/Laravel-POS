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
                          <h3 class="tile-title">Add New Purchase Here</h3>
                          <div class="tile-body">
                            <form class="form-horizontal">

                              

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Date</label>
                                    <div class="col-md-8">
                                    <input name="date" id="demoDate" class="form-control" type="text" placeholder="Date">
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Reference No</label>
                                    <div class="col-md-8">
                                    <input name="reference_no"  class="form-control" type="text" placeholder="Reference">
                                    </div>
                              </div>




                              <div class="form-group row">
                                    <label class="control-label col-md-3">Warehouse</label>
                                    <div class="col-md-8">
                                    <select name="category_code" class="form-control select2" >
                                      <option>-- Select Warehouse --</option>
                                      <option>Percentage (%)</option>
                                      <option>Fixed ($)</option>
                                    </select>
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Biller</label>
                                    <div class="col-md-8">
                                    <select name="category_code" class="form-control select2" >
                                      <option>-- Select Biller --</option>
                                      <option>Percentage (%)</option>
                                      <option>Fixed ($)</option>
                                    </select>
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Customer</label>
                                    <div class="col-md-8">
                                    <select name="category_code" class="form-control select2" >
                                      <option>-- Select Customer --</option>
                                      <option>Percentage (%)</option>
                                      <option>Fixed ($)</option>
                                    </select>
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Invoice Tax</label>
                                    <div class="col-md-8">
                                    <select name="category_code" class="form-control select2" >
                                      <option>-- Select Customer --</option>
                                      <option>Percentage (%)</option>
                                      <option>Fixed ($)</option>
                                    </select>
                                    </div>
                              </div>

                              <div class="tile-footer">
                                <div class="row">
                                  <div class="col-md-8 col-md-offset-3">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Biller</button>
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
  <script  src="{{ asset('assets/admin/js/plugins/bootstrap-datepicker.min.js')}}"></script>
    <script  src="{{ asset('assets/admin/js/plugins/select2.min.js')}}"></script>
    


<script type="text/javascript">

  $('#demoDate').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
      });



  $('.select2').select2();
</script>
        @endsection