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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                  <tr>
                      <td>{{ $product->product_code }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->email }}</td>
                      <td>{{ $product->phone }}</td>
                      <td>{{ $product->address }}</td>
                      <td>
                          <a href="{{ route('products.edit', $product->id) }}"><i class="fa fa-edit"></i></a>
                          <a href="{{ route('products.show', $product->id) }}"><i class="fa fa-eye"></i></a>
                          <a href="#" onclick="return confirmDelete()"><i class="fa fa-trash"></i></a>
                          <form action="{{ route('products.destroy', $product->id) }}" id="deleteForm" method="POST">
                              @csrf
                              @method("DELETE")
                          </form>
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

    <script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
     

    <script type="text/javascript">$('#sampleTable').DataTable();</script>

    @endsection