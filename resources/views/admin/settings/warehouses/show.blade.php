@extends('admin.master')
@section('content')
<main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-edit"></i> Manage Company</h1>
            <p>Manage Company Form</p>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Companies</li>
            <li class="breadcrumb-item"><a href="#">Show Warehouse</a></li>
          </ul>
        </div>
        <div class="row">
<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Bordered Table</h3>
            <table class="table table-bordered">
              
              <tbody>
                <tr>
                  <th>No</th>
                  <td>{{$warehouse->id}}</td>
                </tr>

                <tr>
                  <th>Warehouse Name</th>
                  <td>{{$warehouse->warehouse_name}}</td>
                </tr>

                <tr>
                  <th>Warehouse Code</th>
                  <td>{{$warehouse->warehouse_code}}</td>
                </tr>

                <tr>
                  <th>Address</th>
                  <td>{{$warehouse->address}}</td>
                </tr>

                <tr>
                  <th>City</th>
                  <td>{{$warehouse->city}}</td>
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