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
                          <h3 class="tile-title">Update System Settings Here</h3>
                          <div class="tile-body">
                            <form class="form-horizontal">
                              <div class="form-group row">
                                    <label class="control-label col-md-3">Site Name</label>
                                    <div class="col-md-8">
                                    <input name="site_name" class="form-control" type="text" placeholder="Site Name">
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Language</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2" >
							                <optgroup label="Select Cities">
							                  <option>English</option>
							                  <option>Spanish</option>
							                  <option>Chinise</option>
							                  <option>Arabic</option>
							                  <option>Japanees</option>
							                </optgroup>
							              </select>
                                    </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Warehouse</label>
                                <div class="col-md-8">
                                  <select class="form-control select2" >
					                <optgroup label="Select Cities">
					                  <option>Uttara</option>
					                  <option>Banani</option>
					                  <option>Gulshan</option>
					                  <option>Farmgate</option>
					                </optgroup>
					              </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Currency Code</label>
                                <div class="col-md-8">
                                	<input name="currency code" class="form-control" type="text" placeholder="Currency Code">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Product Tax</label>
                                <div class="col-md-8">
                                  <select class="form-control select2" >
					                <optgroup label="Select Cities">
					                  <option>Disable</option>
					                  <option>No Tax</option>
					                  <option>Vat</option>
					                  <option>GST</option>
					                </optgroup>
					              </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Invoice Tax</label>
                                <div class="col-md-8">
                                  <select class="form-control select2" >
					                <optgroup label="Select Invoice Tax">
					                  <option>Disable</option>
					                  <option>No Tax</option>
					                  <option>Vat</option>
					                  <option>GST</option>
					                </optgroup>
					              </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Date Formate</label>
                                <div class="col-md-8">
                                  <select class="form-control select2" >
					                <optgroup label="Select Date Formate">
					                  <option>mm-dd-yy</option>
					                  <option>mm/dd/yy</option>
					                  <option>mm.dd.yy</option>
					                  <option>dd-mm-yy</option>
					                  <option>dd/mm/yy</option>
					                  <option>dd.mm.yy</option>
					                </optgroup>
					              </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Barcode Symbology</label>
                                <div class="col-md-8">
                                  <select class="form-control select2" >
					                <optgroup label="Select Date Formate">
					                  <option>Code 25</option>
					                  <option>Code 39</option>
					                  <option>Code 128</option>
					                  <option>EAN 8</option>
					                  <option>UPC-A</option>
					                  <option>UPC-E</option>
					                </optgroup>
					              </select>
                                </div>
                              </div>


                              <div class="form-group row">
                                <label class="control-label col-md-3">Barcode Symbology</label>
                                <div class="col-md-8">
                                  <input class="form-control " type="text" name="barcode_symbology" placeholder="Invoice Tax">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Theme</label>
                                <div class="col-md-8">
                                  <select class="form-control "name="product_setial" >
                                  	<option value="enable">Theme-1</option>
                                  	<option value="disable">Theme-2</option>
                                  	<option value="disable">Theme-3</option>
                                  </select>
                                </div>
                              </div>

                              

                              <div class="form-group row">
                                <label class="control-label col-md-3">Product Serial</label>
                                <div class="col-md-8">
                                  <select class="form-control "name="product_setial" >
                                  	<option value="enable">Enable</option>
                                  	<option value="disable">Disable</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Discount Option</label>
                                <div class="col-md-8">
                                  <select class="form-control "name="product_setial" >
                                  	<option value="disable_discount">Disable Discount</option>
                                  	<option value="disable_discount">Apply on invoice total</option>
                                  	<option value="disable_discount">Apply different discount for each product</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Discount Method</label>
                                <div class="col-md-8">
                                  <select class="form-control "name="product_setial" >
                                  	<option value="disable_discount">Apply discount before tax</option>
                                  	<option value="disable_discount">Apply discount after tax</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Default Discount</label>
                                <div class="col-md-8">
                                  <select class="form-control "name="product_setial" >
                                  	<option value="disable_discount">5% Discount</option>
                                  	<option value="disable_discount">10% Discount</option>
                                  	<option value="disable_discount">N/A</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Rows per page</label>
                                <div class="col-md-8">
                                  <select class="form-control "name="product_setial" >
                                  	<option value="10">10</option>
                                  	<option value="25">25</option>
                                  	<option value="50">50</option>
                                  	<option value="100">100</option>
                                  	<option value="all">All ()Not recomended</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Total rows</label>
                                <div class="col-md-8">
                                  <input class="form-control " type="text" name="total_rors" placeholder="Total rows">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Sale Ref Prefix</label>
                                <div class="col-md-8">
                                  <input class="form-control " type="text" name="sale_ref_prefix" placeholder="Sale Ref Prefix">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Quote Ref Prefix</label>
                                <div class="col-md-8">
                                  <input class="form-control " type="text" name="quote_ref_prefix" placeholder="Quote Ref Prefix">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Purchase Ref Prefix</label>
                                <div class="col-md-8">
                                  <input class="form-control " type="text" name="purches_ref_prefix" placeholder="Purchase Ref Prefix">
                                </div>
                              </div>


                              <div class="form-group row">
                                <label class="control-label col-md-3">Transfer Ref Prefix</label>
                                <div class="col-md-8">
                                  <input class="form-control " type="text" name="transfer_ref_prefix" placeholder="Transfer Ref Prefix">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Restrict Sales</label>
                                <div class="col-md-8">
                                  <select class="form-control "name="product_setial" >
                                  	<option value="yes">Yes</option>
                                  	<option value="no">No</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="control-label col-md-3">Calender</label>
                                <div class="col-md-8">
                                  <select class="form-control "name="product_setial" >
                                  	<option value="private">Private</option>
                                  	<option value="shared">Shared</option>
                                  </select>
                                </div>
                              </div>
                              


                              <div class="tile-footer">
                            <div class="row">
                              <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Settings</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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