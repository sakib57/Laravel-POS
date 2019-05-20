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
                          <a href="#" class="btn btn-primary" style="float: right;"><i class="fa fa-eye"></i>View Payment</a>
                          <h3 class="tile-title">Add New Account Here</h3>
                          <div class="tile-body">
                            <form class="form-horizontal" method="post" action="#">
                              @csrf

                              <div class="form-group row">
                                    

                                    <div class="col-md-4">
                                      <label class="control-label">Pay To:</label>
                                      <input name="account_name" class="form-control" type="text" placeholder="Party Name">
                                    </div>
                                    <div class="col-md-4">
                                      <label class="control-label">Ref(#ID):</label>
                                      <input name="account_name" class="form-control" type="text" placeholder="Account Name">
                                    </div>
                                    <div class="col-md-4">
                                      <label class="control-label">Payment Date:</label>
                                      <input name="date" class="form-control" id="demoDate" type="text" >
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <div class="col-md-12 table-responsive">
                                      <table class="table">
                                        <tr>
                                          <th>Select Account</th>
                                          <th >Description</th>
                                          <th>Payable Amount</th>
                                          <th>Paid</th>
                                          <th>Action</th>
                                        </tr>
                                        <tr>
                                          <td>
                                              <select name="fk_category_id" class="form-control select2" >
                                                <option value="">--Select Account--</option>
                                                @foreach($account as $value)
                                                <option value="{{$value->id}}">{{$value->account_name}}, {{$value->account_no}}</option>
                                                @endforeach

                                              </select>
                                          </td>
                                          <td width="40%">
                                            <input name="account_name" class="form-control" type="text" placeholder="Description">
                                          </td>
                                          <td>
                                            <input name="account_name" class="form-control" type="text" placeholder="Payable">
                                          </td>

                                          <td>
                                            <input name="account_name" class="form-control" type="text" placeholder="Paid">
                                          </td>
                                          <td>
                                            <button class="btn btn-danger btn-md" title="Delete" disabled=""> <i class="fa fa-trash"></i> </button>
                                          </td>
                                        </tr>
                                      </table>
                                      <button class="btn btn-info addRow pull-right" type="button">+ Add more</button>
                                      
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="control-label col-md-3">Select Account</label>
                                            <div class="col-md-9">
                                              <select name="fk_category_id" class="form-control" >
                                              <option value="">--Select Account--</option>
                                                @foreach($account as $value)
                                                <option value="{{$value->id}}">{{$value->account_name}}, {{$value->account_no}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                            <label class="control-label col-md-3">Select Method</label>
                                            <div class="col-md-9">
                                              <select name="fk_category_id" class="form-control" >
                                              <option value="">--Select Method--</option>
                                              @foreach($method as $value)
                                              <option value="{{$value->id}}">{{$value->method_name}}</option>
                                              @endforeach
                                            </select>
                                            </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                            <label class="control-label col-md-3">cheque No</label>
                                            <div class="col-md-9">
                                              <input name="account_name" class="form-control" type="text" placeholder="Cheque No">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="control-label col-md-3">Payable Amount</label>
                                            <div class="col-md-9">
                                              <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                <input class="form-control" disabled="" id="exampleInputAmount" type="text" value="45656">
                                              </div>

                                            </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                            <label class="control-label col-md-3">Pay Amount</label>
                                            <div class="col-md-9">
                                              <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                <input class="form-control" disabled="" id="exampleInputAmount" type="text" value="12334">
                                              </div>
                                            </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                            <label class="control-label col-md-3">Due Amount</label>
                                            <div class="col-md-9">
                                              <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                <input class="form-control" disabled="" id="exampleInputAmount" type="text" value="12312">
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="tile-footer">
                            <div class="row">
                              <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Payment</button>
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
  <script src="{{ asset('assets/admin/js/plugins/bootstrap-datepicker.min.js')}}"></script>




<script type="text/javascript">
  $('.addRow').on('click',function () {
      addRow('parts_table');
  });
  function addRow(tableId) {
    var table = document.getElementById(tableId);
      var tr = '<tr>' +
          '<td><select class="form-control"><option value="">--Select Account--</option>@foreach($account as $value)<option value="{{$value->id}}">{{$value->account_name}}, {{$value->account_no}}</option>@endforeach</select></td>'+
          
          '<td><input type="number" min="0" step="any" name="cost_per_unit[]" id="costPerUnit" class="form-control changesNo" autocomplete="off" placeholder="Description" onkeyup="mul()"></td>'+
          
          '<td><input type="number" min="0" step="any" name="quantity[]" id="quantity" class="form-control changesNo" autocomplete="off" placeholder="Payable" onkeyup="mul()"></td>'+


          '<td><input type="number" min="0" step="any" id="txtResult"  class="form-control totalLinePrice" autocomplete="off" placeholder="Paid"></td>'+
          '<td><button class="btn btn-danger btn-md remove delete" name="btn" type="button"><span class="fa fa-trash-o"></span> </button></td>'+
          '</tr>';
      $('tbody').append(tr);
  };
  $('tbody').on('click','.remove', function () {
      $(this).parent().parent().remove();
  });
</script>


<script type="text/javascript">

  $('#demoDate').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
      });


  $('.select2').select2();
</script>
        @endsection