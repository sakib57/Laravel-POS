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
                          <h3 class="tile-title">Add New Category Here</h3>
                          <div class="tile-body">
                            <form class="form-horizontal" method="post" action="{{route('subcategories.update',$sub_category->id)}}">
                              @csrf
                              @method('PUT')

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Parent Category</label>
                                    <div class="col-md-8">
                                    <select name="fk_category_id" class="form-control" >
                                      
                                      <option value="{{$sub_category->fk_category_id}}">{{$sub_category->category_name}}</option>
                                      @foreach($category as $value)
                                      <option value="{{$value->id}}">{{$value->category_name}}</option>
                                      @endforeach
                                    </select>
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="control-label col-md-3">Category Code</label>
                                    <div class="col-md-8">
                                    <input name="sub_category_code" class="form-control" type="text" value="{{$sub_category->sub_category_code}}" placeholder="Category Code">
                                    <input type="hidden" name="updated_by" value="{{$user_id_session }}">
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label class="control-label col-md-3">Category Name</label>
                                    <div class="col-md-8">
                                    <input name="sub_category_name" class="form-control" type="text" value="{{$sub_category->sub_category_name}}" placeholder="Category Name">
                                    </div>
                              </div>

                              
                              


                              <div class="tile-footer">
                            <div class="row">
                              <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Sub Category</button>
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