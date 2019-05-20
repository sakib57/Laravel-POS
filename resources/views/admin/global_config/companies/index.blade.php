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
            <li class="breadcrumb-item"><a href="#">Manage Company</a></li>
          </ul>
        </div>
        <div class="row">
                <div class="col-md-12">
                  @if(Session::get('message'))
                  <div class="alert-success">
                    {{ Session::get('message') }}
                  </div>
                  @endif
                  
                  <div class="tile">
                    <div class="tile-body">
                      <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($companies as $company)
                          <tr>
                              <td>{{ $company->name }}</td>
                              <td>{{ $company->phone }}</td>
                              <td>{{ $company->email }}</td>
                              <td>{{ $company->address }}</td>
                              <td>
                                <a href="{{ route('companies.edit', $company->id) }}"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('companies.show', $company->id) }}"><i class="fa fa-eye"></i></a>
                                <a href="#" onclick="return confirmDelete()"><i class="fa fa-trash"></i></a>
                                <form action="{{ route('companies.destroy', $company->id) }}" id="deleteForm" method="POST">
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
    
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

        @endsection