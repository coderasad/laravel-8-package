@extends('layouts.app')
@section('title')
    Sub Category
@endsection
@section('content')

    <div class="col-md-6 m-auto ">
        <div class="card">
            <form action="{{ route('admin.subcategory.update',$subcat->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    
                    <span class="badge badge-success mb-3"><a class="text-white" href="{{ route('admin.subcategory.index') }}"><i class="fa fa-step-backward text-white"></i></a></span>
                    
                    <div class="form-group">
                        <label for="ac_type_id">Account Type 
                        <span class="text-danger">*</span></label>
                        <select name="ac_type_id" class="form-control @error('ac_type_id') is-invalid @enderror" id="ac_type_id">
                            <option value="1" {{ $subcat->ac_type_id == '1' ? 'selected' : '' }}>Grocery</option>
                            <option value="2" {{ $subcat->ac_type_id == '2' ? 'selected' : '' }}>Restaurant</option>
                            <option value="3" {{ $subcat->ac_type_id == '3' ? 'selected' : '' }}>Servece</option>  
                            <option value="4" {{ $subcat->ac_type_id == '4' ? 'selected' : '' }}>Book</option>  
                            <option value="5" {{ $subcat->ac_type_id == '5' ? 'selected' : '' }}>Shop</option>
                        </select>
                        @error('ac_type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <label for="ac_type_id">Category Name 
                        <span class="text-danger">*</span></label>
                        <select name="cat_id" class="form-control @error('cat_id') is-invalid @enderror" id="cat_id">
                            @php
                                $category = DB::table('categories')->where('status',1)->where('ac_type_id', $subcat->ac_type_id)->get();
                            @endphp
                            @foreach ($category as $item)
                               @if ($item->id == $subcat->cat_id)
                                    <option value="{{ $item->id }}" selected>
                                        {{ $item->name }}
                                    </option>  
                               @else
                               <option value="{{ $item->id }}" >
                                    {{ $item->name }}
                                </option>  
                               @endif
                            @endforeach                                    
                        </select>
                        @error('cat_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <label>Sub-Category Name 
                        <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Sub Category" value="{{ $subcat->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>        
                    
                    <button type="submit" class="py-1 btn btn-primary mr-2">Update</button>               
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // sub-category ac type 
        $("body").on("change", "#ac_type_id", function (e) {
            let ac_type_id = $(this).val();
            let _token = "{{ csrf_token() }}"

            $.post("{{ route('admin.acType') }}",{_token: _token,ac_type_id: ac_type_id},function(data) {
                $(".ar-hide").show()
                $("select[name='cat_id']").html(data);
            })
        })
    </script>
@endpush