@extends('admin.master')
@section('content')

<main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-edit"></i> System Settings</h1>
            <p>Create Company Form</p>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Companies</li>
            <li class="breadcrumb-item"><a href="#">Add Company</a></li>
          </ul>
        </div>
        <div class="row">
                <div class="col-md-12">
                        <div class="tile">
                          
                          <h3 class="tile-title">Update Payment Method Here</h3>
                          <div class="tile-body">
                            <form class="form-horizontal" method="post" action="{{route('payments-method.update',$payment->id)}}">
                              @csrf
                              @method('PUT')
                              <div class="form-group row">
                                    <label class="control-label col-md-3">Payment Method Name</label>
                                    <div class="col-md-8">
                                    <input name="method_name" value="{{$payment->method_name}}" class="form-control" type="text" placeholder="Method Name">
                                    <input type="hidden" name="user_id" value="{{$user_id_session }}">
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Description</label>
                                    <div class="col-md-8">
                                    <textarea class="form-control" type="text" rows="5" name="description">{{$payment->description}}</textarea>
                                    </div>
                              </div>

                              

                              <div class="tile-footer">
                            <div class="row">
                              <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Payment Method</button>
                              </div>
                            </div>
                          </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
        </div>
</main>

  <script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
    <script  src="{{ asset('assets/admin/js/plugins/select2.min.js')}}"></script>


<script type="text/javascript">
  $('.select2').select2();
</script>
        @endsection