@extends('backend.layouts.app')
@section('title')
    Sub-Category
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Sub-Category</h4>
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
               <form action="{{ Route('admin.category.store') }}" method="POST">
                    <div class="form-group">
                        <label for="categoryName">Sub-Category Name</label>
                        <input type="text" class="form-control" maxlength="25" name="categoryName" id="defaultconfig">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-success">
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