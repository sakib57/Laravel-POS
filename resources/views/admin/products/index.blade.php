@extends('admin.master')
@section('content')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Product Information</h1>
          <p>Product information Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Product Information</li>
          <li class="breadcrumb-item active"><a href="#">Product Information Table</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
            @if(Session::get('message'))
            <div class="alert alert-success">
              {{ Session::get('message') }}
            </div>
            @endif
          
          <div class="tile">
            <h3 class="tile-title">Product List Here</h3>
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Product Unit</th>
                    <th>Product Size</th>
                    <th>Product Cost</th>
                    <th>Product Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                  <tr>
                      <td>{{ $product->product_code }}</td>
                      <td>{{ $product->product_name }}</td>
                      <td>{{ $product->product_unit }}</td>
                      <td>{{ $product->product_size }}</td>
                      <td>{{ $product->product_cost }}</td>
                      <td>{{ $product->product_price }}</td>
                      <td>
                          <a href="{{ route('products.edit', $product->id) }}"><i class="fa fa-edit"></i></a>
                          <a href="{{ route('products.show', $product->id) }}"><i class="fa fa-eye"></i></a>
                          <a href="#" data-toggle="modal" onclick="deleteData({{ $product->id }})" 
                            data-target="#DeleteModal"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>                        
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>


    <script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
     

    <script type="text/javascript">$('#sampleTable').DataTable();</script>

    <script type="text/javascript">
        function deleteData(id)
        {
            var id = id;
            var url = '{{ route("products.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
         $("#deleteForm").submit();
        }
      </script>

@include('admin.includes.delete_confirm')

    @endsection