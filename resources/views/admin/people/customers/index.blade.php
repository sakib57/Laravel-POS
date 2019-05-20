@extends('admin.master')
@section('content')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Customer Information</h1>
          <p>Customer information Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Customer Information</li>
          <li class="breadcrumb-item active"><a href="#">Customer Information Table</a></li>
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
            <h3 class="tile-title">Customer List Here</h3>
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Customer Code</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($customers as $customer)
                  <tr>
                      <td>{{ $customer->customer_code }}</td>
                      <td>{{ $customer->name }}</td>
                      <td>{{ $customer->email }}</td>
                      <td>{{ $customer->phone }}</td>
                      <td>{{ $customer->address }}</td>
                      <td>
                          <a href="{{ route('customers.edit', $customer->id) }}"><i class="fa fa-edit"></i></a>
                          <a href="{{ route('customers.show', $customer->id) }}"><i class="fa fa-eye"></i></a>
                          <a href="#" data-toggle="modal" data-target="#DeleteModal" onclick="deleteData({{ $customer->id }})"><i class="fa fa-trash"></i></a>
                          
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
          var url = '{{ route("customers.destroy", ":id") }}';
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