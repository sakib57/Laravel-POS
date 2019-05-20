@extends('admin.master')
@section('content')

<main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-edit"></i> People</h1>
            <p>Import Customer Form</p>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Customers</li>
            <li class="breadcrumb-item"><a href="#">Import Customers</a></li>
          </ul>
        </div>
        <div class="row">
                <div class="col-md-12">

                    @if(Session::get('message'))
                    <div class="alert alert-success">
                      {{ Session::get('message') }}
                    </div>
                    @endif
          
                    @if(Session::get('error'))
                    <div class="alert alert-danger">
                      {{ Session::get('error') }}
                    </div>
                    @endif
          
                    
                        @if($errors->any())
                        <div class="alert-danger">
                            <ul class="list-unstyled">
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="tile">
                          <h3 class="tile-title">Import Customers Here</h3>
                          <div class="tile-body">
                            <form class="form-horizontal" method="POST" action="{{ url('people/customers/parse_import') }}" enctype="multipart/form-data">
                                @csrf
                               
                              <div class="form-group row">
                                    <label class="control-label col-md-3">Upload CSV file</label>
                                    <div class="col-md-8">
                                    <input name="customer_csv" type="file" class="form-control">
                                    <div class="text-danger">
                                        {{ $errors->has('customer_csv') ? $errors->first('customer_csv'):'' }}
                                    </div>
                                    </div>
                              </div>

                              <div class="tile-footer">
                                <div class="row">
                                  <div class="col-md-8 col-md-offset-3">
                                    <button class="btn btn-primary" type="submit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Customer</button>
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