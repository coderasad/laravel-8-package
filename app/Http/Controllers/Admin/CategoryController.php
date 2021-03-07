<?php

namespace App\Http\Controllers\Admin;

use App\Models\Yajra;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    
    public function index()
    {
        $data['category'] = Category::where('status', 1)->latest()->get();
        return view('backend.pages.category.index', $data);
    }
    
    // store 
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories|max:30',
            'category_img' => 'required',
        ]);
        $category = new Category();
        $category->category_name = $request->category_name;
        if($request->hasFile('category_img')){
            $category->category_img  = $request->file('category_img')->store('backend/image/category',['disk' => 'public_uploads']);  
        }
        $save = $category->save();    

        if($save){
            session()->flash('level', 'success');
            session()->flash('msg', 'Add Successfully. ');
            return redirect()->back();
        }    
    }
    
    // edit 
    public function edit($id)
    {
        $data['category'] = category::findorfail($id);
        return view('backend.pages.category.edit', $data);
    }
    
    // update 
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,' .$id. ',id',
        ]);   
        $category = category::findorfail($id);
        $category->category_name = $request->category_name;
        if($request->hasFile('category_img')){
            if(isset($request->old_img)){
                unlink('public/'.$request->old_img);
            }
            $category->category_img = $request->file('category_img')->store('backend/image/category', ['disk' => 'public_uploads']);
        };
          
        $db = $category->save();

        if($db){
            session()->flash('level', 'success');
            session()->flash('msg', 'Update Successfully');
            return redirect()->to('admin/category');
        }else{
            session()->flash('level', 'warning');
            session()->flash('msg', 'No Update');
            return redirect()->to('admin/category');
        }
        
    }

    // destroy 
    public function destroy(Request $request, $id)
    {
        $category = category::findorfail($id);
        if($category) {
            $category->status = 0;
            $category->category_name = $category->id.$category->category_name;
            $category->save();            
            session()->flash('level', 'danger');
            session()->flash('msg', 'Delete Successfully');
        }
        return redirect()->back();
    }
}
