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
            <li class="breadcrumb-item"><a href="#">Manage Accounts</a></li>
          </ul>
        </div>
        <div class="row">
<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Account Detail</h3>
            <table class="table table-bordered">
              
              <tbody>
                <tr>
                  <th>Account No</th>
                  <td>{{$account->account_no}}</td>
                </tr>

                

                <tr>
                  <th>Account Name</th>
                  <td>{{$account->account_name}}</td>
                </tr>

                <tr>
                  <th>Branch Name</th>
                  <td>{{$account->branch_name}}</td>
                </tr>

                <tr>
                  <th>Status</th>
                  <td>
                    @if($account->status==1)
                      <a href="{{route('account.status',$account->id)}}"  class="btn btn-success btn-sm">Active</a>
                    @else
                      <a href="{{route('account.status',$account->id)}}"  class="btn btn-warning btn-sm">Inactive</a>
                    @endif
                  </td>
                </tr>

                <tr>
                  <th>Default</th>
                  <td>
                    @if($account->default_account==1)
                      <button class="btn btn-success btn-sm" type="button" disabled="">Yes</button>
                    @else
                      <button class="btn btn-dager btn-sm" type="button" disabled="">No</button>
                    @endif
                  </td>
                </tr>

               
              </tbody>
            </table>
          </div>
        </div>

        </div>
</main>



    
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

        @endsection