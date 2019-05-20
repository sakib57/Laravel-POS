@extends('admin.master')
@section('content')

<main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-edit"></i> People</h1>
            <p>Create Purchase Form</p>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Purchases</li>
            <li class="breadcrumb-item"><a href="#">Add Purchase</a></li>
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

                        <div class="tile">
                          <h3 class="tile-title">Add New Purchase Here</h3>
                          <div class="tile-body">
                            <form class="form-horizontal" method="POST" action="{{ route('purchases.store') }}">
                                @csrf
                                <input type="hidden" name="fk_company_id" value="{{ $company_id_session }}">
                                <input type="hidden" name="fk_created_by" value="{{ $user_id_session }}">
                                <input type="hidden" name="fk_updated_by" value="{{ $user_id_session }}">
                                <input type="hidden" name="purchase_code" value="{{ $purchase_code_db }}">

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Name</label>
                                    <div class="col-md-8">
                                    <input name="name" value="{{ old('name') }}" class="form-control" type="text" placeholder="Name">
                                    <div class="text-danger">
                                        {{ $errors->has('name') ? $errors->first('name'):'' }}
                                    </div>
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label class="control-label col-md-3">Email</label>
                                    <div class="col-md-8">
                                    <input name="email" value="{{ old('email') }}" class="form-control" type="email" placeholder="Email">
                                    <div class="text-danger">
                                        {{ $errors->has('email') ? $errors->first('email'):'' }}
                                    </div>
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Phone</label>
                                    <div class="col-md-8">
                                    <input name="phone" value="{{ old('phone') }}" class="form-control" type="number" placeholder="Phone">
                                    <div class="text-danger">
                                        {{ $errors->has('phone') ? $errors->first('phone'):'' }}
                                    </div>
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Address</label>
                                    <div class="col-md-8">
                                    <textarea name="address" class="form-control" rows="5" type="text" placeholder="Address">{{ old('address') }}</textarea>
                                    <div class="text-danger">
                                        {{ $errors->has('address') ? $errors->first('address'):'' }}
                                    </div>
                                    </div>
                              </div>
<!-- add product -->




<table class="table table-bordered table-hover" id="table_auto parts_table">
    <thead>
    <tr>
        <th width="28%">Parts Name</th>
        <th>Cost Per Unit</th>
        <th colspan="2">Quantity</th>
        <th>Total</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><input placeholder="Parts Name" type="text" name="parts_name[]" data-type="purchase_name" class="form-control autocomplete_txt"></td>
        <td><input type="number" min="0" step="any" name="cost_per_unit[]" id="costPerUnit" class="form-control changesNo" autocomplete="off" placeholder="Unit Price" onkeyup="mul()" ></td>
        <td><input type="number" min="0" step="any" name="quantity[]" id="quantity" class="form-control changesNo" autocomplete="off" placeholder="Qty" onkeyup="mul()"></td>
        <td><span id="uom_1">Unit</span></td>
        <td><input type="number" min="0" step="any" id="txtResult"  class="form-control totalLinePrice" autocomplete="off" placeholder="Sub Total">
        </td>
        <td><a href="" class="btn btn-danger"><span class="fa fa-trash-o"></span></a></td>
    </tr>
    </tbody>
</table>
<div class="full-right">
    <th> <button class="btn btn-success addRow pull-right" type="button">+ Add more</button></th>
</div>

<!-- /add product -->




<div class="tile-footer">
    <div class="row">
      <div class="col-md-8 col-md-offset-3">
        <button class="btn btn-primary" type="submit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Purchase</button>
      </div>
    </div>
  </div>

                            </form>
                          </div>
                          
                        </div>
                      </div>
        </div>
</main>


//add products
<script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
    

<script type="text/javascript">
  $('.addRow').on('click',function () {
      addRow('parts_table');
  });
  function addRow(tableId) {
    var table = document.getElementById(tableId);
      var tr = '<tr>' +
          '<td><input placeholder="Parts Name" type="text" name="parts_name[]"  data-type="purchase_name" class="form-control autocomplete_txt"></td>'+
          '<td><input type="number" min="0" step="any" name="cost_per_unit[]" id="costPerUnit" class="form-control changesNo" autocomplete="off" placeholder="Unit Price" onkeyup="mul()"></td>'+
          '<td><input type="number" min="0" step="any" name="quantity[]" id="quantity" class="form-control changesNo" autocomplete="off" placeholder="Qty" onkeyup="mul()"></td>'+
          '<td><span id="uom_1">Unit</span></td>'+
          '<td><input type="number" min="0" step="any" id="txtResult"  class="form-control totalLinePrice" autocomplete="off" placeholder="Sub Total"></td>'+
          '<td><button class="btn btn-danger remove delete" name="btn" type="button"><span class="fa fa-trash-o"></span> </button></td>'+
          '</tr>';
      $('tbody').append(tr);
  };
  $('tbody').on('click','.remove', function () {
      $(this).parent().parent().remove();
  });
</script>

<script type="text/javascript">
  function mul() {
      var costPerUnit = document.getElementById('costPerUnit').value;
      var quantity = document.getElementById('quantity').value;
      var result = parseInt(costPerUnit) * parseInt(quantity);
      if (!isNaN(result)) {
          document.getElementById('txtResult').value = result;
      }
  }
</script>


//





  <script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
    <script  src="{{ asset('assets/admin/js/plugins/select2.min.js')}}"></script>


<script type="text/javascript">
  $('.select2').select2();
</script>
        @endsection