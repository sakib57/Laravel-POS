@extends('admin.master')
@section('content')

<main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-edit"></i> People</h1>
            <p>Create Product Form</p>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item"><a href="#">Add Product</a></li>
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
                          <h3 class="tile-title">Add New Product Here</h3>
                          <div class="tile-body">
                            <form class="form-horizontal" method="POST" action="{{ route('products.store') }}">
                                @csrf
                                <input type="hidden" name="fk_company_id" value="{{ $company_id_session }}">
                                <input type="hidden" name="fk_created_by" value="{{ $user_id_session }}">
                                <input type="hidden" name="fk_updated_by" value="{{ $user_id_session }}">
                                <input type="hidden" name="product_code" value="{{ $product_code_db }}">

                             
                          <div class="form-group row">
                                <label class="control-label col-md-3">Product Name</label>
                                <div class="col-md-8">
                                  <input name="product_name" value="{{ old('product_name') }}" class="form-control" type="text" placeholder="Product Name">
                                  <div class="text-danger">
                                      {{ $errors->has('product_name') ? $errors->first('product_name'):'' }}
                                  </div>
                                </div>
                          </div>


                          <div class="form-group row">
                                <label class="control-label col-md-3">Category</label>
                                <div class="col-md-8">
                                  <select name="fk_category_id" id="fk_category_id" class="form-control select2" >
                                    <option value="0">select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" onchange="getSubcategories($category->id)">{{ $category->category_name }}</option>
                                    @endforeach
                                  </select>
                                  <div class="text-danger">
                                      {{ $errors->has('fk_category_id') ? $errors->first('fk_category_id'):'' }}
                                  </div>
                                </div>
                          </div>

                          <div class="form-group row">
                                <label class="control-label col-md-3">Sub Category</label>
                                <div class="col-md-8">
                                <select name="fk_sub_category_id" id="fk_sub_category_id" class="form-control" >
                                 
                                </select>
                                <div class="text-danger">
                                    {{ $errors->has('fk_sub_category_id') ? $errors->first('fk_sub_category_id'):'' }}
                                </div>
                              
                                </div>
                          </div>

                          <div class="form-group row">
                                <label class="control-label col-md-3">Product Unit</label>
                                <div class="col-md-8">
                                <input name="product_unit" value="{{ old('product_unit') }}"  class="form-control" type="number" placeholder="Product Unit">
                                <div class="text-danger">
                                    {{ $errors->has('product_unit') ? $errors->first('product_unit'):'' }}
                                </div>
                              
                                </div>
                          </div>

                          <div class="form-group row">
                                <label class="control-label col-md-3">Product Size</label>
                                <div class="col-md-8">
                                <input name="product_size" value="{{ old('product_size') }}" class="form-control" type="number" placeholder="Product Size">
                                <div class="text-danger">
                                    {{ $errors->has('product_size') ? $errors->first('product_size'):'' }}
                                </div>
                              
                                </div>
                          </div>

                          <div class="form-group row">
                                <label class="control-label col-md-3">Product Cost</label>
                                <div class="col-md-8">
                                <input name="product_cost" value="{{ old('product_cost') }}" class="form-control" type="number" placeholder="Product Cost">
                                <div class="text-danger">
                                    {{ $errors->has('product_cost') ? $errors->first('product_cost'):'' }}
                                </div>
                              
                                </div>
                          </div>

                          <div class="form-group row">
                              <label class="control-label col-md-3">Product Price</label>
                              <div class="col-md-8">
                              <input name="product_price" value="{{ old('product_price') }}"  class="form-control" type="number" placeholder="Product Price">
                              <div class="text-danger">
                                  {{ $errors->has('product_price') ? $errors->first('product_price'):'' }}
                              </div>
                            
                              </div>
                          </div>

                          <div class="form-group row">
                                <label class="control-label col-md-3">Alert Quantity</label>
                                <div class="col-md-8">
                                <input name="product_alert_quantity" value="{{ old('product_alert_quantity') }}" class="form-control" type="number" placeholder="Alert Quantity">
                                <div class="text-danger">
                                    {{ $errors->has('product_alert_quantity') ? $errors->first('product_alert_quantity'):'' }}
                                </div>
                              
                                </div>
                          </div>
                          
                          <div class="form-group row">
                                <label class="control-label col-md-3">Reference No</label>
                                <div class="col-md-8">
                                <input name="product_reference" value="{{ old('product_reference') }}" class="form-control" type="text" placeholder="Reference">
                                <div class="text-danger">
                                    {{ $errors->has('product_reference') ? $errors->first('product_reference'):'' }}
                                </div>
                              
                                </div>
                          </div>




                          <div class="form-group row">
                                <label class="control-label col-md-3">Warehouse</label>
                                <div class="col-md-8">
                                <select name="fk_warehouse_id" class="form-control select2" >
                                   @foreach ($warehouses as $warehouse)
                                       <option value="{{ $warehouse->id }}">{{ $warehouse->warehouse_name }}</option>
                                   @endforeach
                                </select>
                                <div class="text-danger">
                                    {{ $errors->has('fk_warehouse_id') ? $errors->first('fk_warehouse_id'):'' }}
                                </div>  
                              
                              </div>
                          </div>

                          <div class="form-group row">
                                <label class="control-label col-md-3">Biller</label>
                                <div class="col-md-8">
                                <select name="fk_biller_id" class="form-control select2" >
                                  @foreach ($billers as $biller)
                                      <option value="{{ $biller->id }}">{{ $biller->name }}</option>
                                  @endforeach
                                </select>
                                <div class="text-danger">
                                    {{ $errors->has('fk_biller_id') ? $errors->first('fk_biller_id'):'' }}
                                </div>
                              
                                </div>
                          </div>

                          <div class="form-group row">
                                <label class="control-label col-md-3">Customer</label>
                                <div class="col-md-8">
                                <select name="fk_customer_id" class="form-control select2" >
                                  @foreach ($customers as $customer)
                                      <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                  @endforeach
                                </select>
                                
                                <div class="text-danger">
                                    {{ $errors->has('fk_customer_id') ? $errors->first('fk_customer_id'):'' }}
                                </div>
                              </div>
                          </div>

                          <div class="form-group row">
                                <label class="control-label col-md-3">Invoice Tax</label>
                                <div class="col-md-8">
                                <select name="fk_product_tax" class="form-control select2" >
                                  @foreach ($tax_rates as $tax_rate)
                                    <option value="{{ $tax_rate->id }}">{{ $tax_rate->tax_rate_title }}</option>
                                  @endforeach
                                </select>
                                <div class="text-danger">
                                    {{ $errors->has('fk_product_tax') ? $errors->first('fk_product_tax'):'' }}
                                </div>

                                </div>
                          </div>

                              <div class="tile-footer">
                                <div class="row">
                                  <div class="col-md-8 col-md-offset-3">
                                    <button class="btn btn-primary" type="submit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Product</button>
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

<script>
$('#fk_category_id').change(function(){
  
  var categoryId = $(this).val();
  if(categoryId){
    
      $.ajax({
      type:"GET",
      url:"{{ url('products/sub_categories/') }}?id="+categoryId,
      success:function(res){
        if(res){
          $("#fk_sub_category_id").empty();
          $.each(res, function(id, subcategoryName){
            $("#fk_sub_category_id").append('<option value="'+id+'">'+subcategoryName+'</option>');
          });
        }else{
          $("#fk_sub_category_id").empty();
        }

      }
    });
  }else{
    $("#fk_sub_category_id").empty();
  }
});

   </script>


        @endsection