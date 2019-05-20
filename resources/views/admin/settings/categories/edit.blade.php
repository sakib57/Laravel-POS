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
                        <form class="form-horizontal" method="POST" action="{{ route('categories.update', $category->id) }}">
                          @csrf
                          @method('PUT')
                          
                          <div class="tile">
                          <h3 class="tile-title">Update Category Here</h3>
                          <div class="tile-body">

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Category Code</label>
                                    <div class="col-md-8">
                                    <input name="category_code" value="{{$category->category_code}}" class="form-control" type="text" placeholder="Category Code">
                                    <input type="hidden" name="updated_by" value="{{$user_id_session }}">
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label class="control-label col-md-3">Category Name</label>
                                    <div class="col-md-8">
                                    <input name="category_name" value="{{$category->category_name}}" class="form-control" type="text" placeholder="Category Name">
                                    </div>
                                    </div>
                              </div>

                              
                              


                              <div class="tile-footer">
                            <div class="row">
                              <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Category</button>
                              </div>
                            </div>
                          </div>
                            
                          </div>
                          
                        </div>
                      </form>
                      </div>
        </div>
</main>

	<script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
    <script  src="{{ asset('assets/admin/js/plugins/select2.min.js')}}"></script>


<script type="text/javascript">
	$('.select2').select2();
</script>
        @endsection