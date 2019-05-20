@extends('admin.master')
@section('content')
<main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-edit"></i> Show Product</h1>
            <p>Show Product</p>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item"><a href="#">Show Product</a></li>
          </ul>
        </div>
        <div class="row">
        
          <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Products Table</h3>
            <table class="table table-bordered">
              
              <tbody>
                <tr>
                  <th>Product Code</th>
                  <td>{{ $product->product_code }}</td>
                </tr>
                <tr>
                  <th>Product Name</th>
                  <td>{{ $product->product_name }}</td>
                </tr>
                <tr>
                  <th>Product Category</th>
                  <td>{{ $product->fk_category_id }}</td>
                </tr>
                <tr>
                  <th>Product Sub Category</th>
                  <td>{{ $product->fk_sub_category_id }}</td>
                </tr>
                <tr>
                  <th>Product Unit</th>
                  <td>{{ $product->product_unit }}</td>
                </tr>
                <tr>
                  <th>Product Size</th>
                  <td>{{ $product->product_size }}</td>
                </tr>
                <tr>
                  <th>Product Cost</th>
                  <td>{{ $product->product_cost }}</td>
                </tr>
                <tr>
                  <th>Product Price</th>
                  <td>{{ $product->product_price }}</td>
                </tr>
                <tr>
                  <th>Product Alert Quantity</th>
                  <td>{{ $product->product_alert_quantity }}</td>
                </tr>
                <tr>
                  <th>Product Reference</th>
                  <td>{{ $product->product_reference }}</td>
                </tr>
                <tr>
                  <th>Product Warehouse</th>
                  <td>{{ $product->fk_warehouse_id }}</td>
                </tr>
                <tr>
                  <th>Product Biller</th>
                  <td>{{ $product->fk_biller_id }}</td>
                </tr>
                <tr>
                  <th>Product Customer</th>
                  <td>{{ $product->fk_customer_id }}</td>
                </tr>
                <tr>
                  <th>Product Tax</th>
                  <td>{{ $product->fk_product_tax }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        </div>
</main>

<script>
function confirmDelete(){
  var cnf=confirm('Are you sure?');
  if(cnf){
      $('#deleteForm').submit();
      return true;
  }else{
    return false;
  }
}
</script>
    
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

        @endsection