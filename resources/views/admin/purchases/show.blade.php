@extends('admin.master')
@section('content')
<main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-edit"></i> Manage Purchase</h1>
            <p>Manage Purchase Form</p>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Purchases</li>
            <li class="breadcrumb-item"><a href="#">Show Purchase</a></li>
          </ul>
        </div>
        <div class="row">

          <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Purchases Table</h3>
            <table class="table table-bordered">
              
              <tbody>
                <tr>
                  <th>Purchase Code</th>
                  <td>{{ $purchase->purchase_code }}</td>
                </tr>
                <tr>
                  <th>Purchase Name</th>
                  <td>{{ $purchase->name }}</td>
                </tr>
                <tr>
                  <th>Purchase Email</th>
                  <td>{{ $purchase->email }}</td>
                </tr>
                <tr>
                  <th>Purchase Phone</th>
                  <td>{{ $purchase->phone }}</td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td>{{ $purchase->address }}</td>
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