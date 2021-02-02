@extends('layouts.app')
@section('title')
    Category
@endsection
@section('content')

    <div class="col-md-6 m-auto ">
        <div class="card">
            <form action="{{ route('admin.category.update',$category->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    
                    <span class="badge badge-success mb-3"><a class="text-white" href="{{ route('admin.category.index') }}"><i class="fa fa-step-backward text-white"></i></a></span>
                    <div class="form-group">
                        <label>Category Name 
                        <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Category" value="{{ $category->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="ac_type_id">Account Type 
                        <span class="text-danger">*</span></label>
                        <select name="ac_type_id" class="form-control @error('ac_type_id') is-invalid @enderror" id="ac_type_id">
                            <option value="1" {{ $category->ac_type_id == '1' ? 'selected' : '' }}>Grocery</option>
                            <option value="2" {{ $category->ac_type_id == '2' ? 'selected' : '' }}>Restaurant</option>
                            <option value="3" {{ $category->ac_type_id == '3' ? 'selected' : '' }}>Service</option>   
                            <option value="4" {{ $category->ac_type_id == '4' ? 'selected' : '' }}>Book</option>  
                            <option value="5" {{ $category->ac_type_id == '5' ? 'selected' : '' }}>Shop</option>  
                        </select>
                        
                        @error('ac_type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                    
                    <div class="form-group ">
                        <label for="imgInp">Image
                        <span class="text-danger">*</span></label>
                        <input id="imgInp" type="file" name="img" class=" overflow-hidden form-control @error('img') is-invalid @enderror">
                        @if ($category->img != NULL)
                            <input type="hidden" class="form-control" name="old_img" value="{{$category->img}}">
                        @endif                        
                        @error('img')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="mt-5">
                            @if ($category->img != NULL)
                            <div class="form-group">
                                <img src={{ asset("{$category->img}") }} alt="" id="img_show" class="img-thumbnail w-100px">
                            </div>
                            @else              
                            <div class="form-group">
                                <img src="" id="img_show" class="img-thumbnail w-100px">
                            </div>
                        @endif
                        
                            <img id='img_show' src="" alt="" >
                        </div>
                        
                    </div> 
                    
                    <button type="submit" class="py-1 btn btn-primary mr-2">Update</button>               
                </div>
            </form>
        </div>
    </div>
@endsection