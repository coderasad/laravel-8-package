@extends('backend.layouts.app')
@section('title')
    Category
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Category</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ Route('admin.category.index') }}">Category</a></li>
                    <li class="breadcrumb-item active">Category</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-4">
            <div class="card-box">
                <form action="{{ Route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('category_name') ? ' has-danger ' : '' }}">
                        <label for="categoryName">Category Name</label>
                        <input type="text" class="form-control {{ $errors->has('category_name') ? 'form-control-danger' : '' }}"  value="{{ old('category_name') }}" maxlength="30" name="category_name" id="defaultconfig" placeholder="Enter Category Name" >
                        @error('category_name')
                            <span class="form-control-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group  {{ $errors->has('category_img') ? ' has-danger ' : '' }}">
                        <label for="">Image</label>
                        <input  name="category_img" type="file" class="filestyle {{ $errors->has('category_img') ? 'form-control-danger' : '' }}"  data-iconname="fa fa-cloud-upload" data-buttonname="btn-secondary" id="imgInp" tabindex="-1">
                        @error('category_img')
                            <span class="form-control-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="mt-2">
                            <img id='img_show' src="" alt="" class="img-thumbnail w-25">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success waves-effect" >Save</button>
                    </div>
                </form>
            </div>
         </div>
         <div class="col-md-8">
            <div class="card-box">
                dfdf
            </div>
         </div>
    </div>
   
@endsection