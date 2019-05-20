@extends('admin.master')
@section('content')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Table</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <a href="{{route('tax-rates.create')}}" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i>Add Tax Rate</a>
            <h3 class="tile-title">Tax Rate List Here</h3>
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Tax Rate</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($all_tax_rate as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->tax_rate_title}}</td>
                    <td>{{$value->amount}}</td>
                    <td>
                      @if($value->tax_rate_type == 0)
                        Percentage (%)
                      @elseif($value->tax_rate_type == 1)
                        Fixed ($)
                      @endif
                    </td>
                    <td>
                      <a class="btn btn-info btn-sm" title="Edit" href="{{ route('tax-rates.edit',$value->id) }}"> <i class="fa fa-edit"></i> </a> |
                      <a class="btn btn-primary btn-sm" title="View" href="{{ route('tax-rates.show',$value->id) }}"> <i class="fa fa-eye"></i> </a> |
                        <a class="btn btn-danger btn-sm" title="Delete" onclick="formSubmit('{{$value->id}}')" href="#"> <i class="fa fa-trash"></i> </a>
                      
                      
                      <form action="{{route('tax-rates.destroy', $value)}}" id="deleteForm_{{$value->id}}" method="POST">
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


    <script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/sweetalert.min.js')}}"></script>
     

    <script type="text/javascript">$('#sampleTable').DataTable();</script>

    <script>
      function formSubmit(id)
      {
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this data !",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plz!",
          closeOnConfirm: false,
          closeOnCancel: false
        }, function(isConfirm) {
          if (isConfirm) {
            $('#deleteForm_'+id).submit();
            swal("Deleted!", "Your data has been deleted.", "success");
          } else {
            swal("Cancelled", "Your data is safe :)", "error");
          }
        });
      }
     </script>

    @endsection