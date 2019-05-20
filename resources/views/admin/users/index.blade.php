@extends('admin.master')
@section('content')

<main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-edit"></i> Manage User</h1>
            <p>Manage User Form</p>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item"><a href="#">Manage User</a></li>
          </ul>
        </div>
        <div class="row">
                <div class="col-md-12">
                  <div class="tile">
                    <div class="tile-body">
                      <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                  <a href="#"><i class="fa fa-edit"></i></a>
                                  <a href="#"><i class="fa fa-eye"></i></a>
                                  <a href="#"><i class="fa fa-trash"></i></a>
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
    
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

        @endsection