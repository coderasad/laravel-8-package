<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $data['category'] = category::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('backend.pages.category.index')->with($data);
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
        $data['catall'] = category::all();
        return view('admin.category.edit')->with($data);
    }
    
    // update 
    public function update(Request $request, $id)
    {
        $request->validate([
            'ac_type_id' => 'required',
            'name' => 'required|unique:categories,name,' .$id. ',id',
        ]); 

        $category = category::findorfail($id);
        $category->name = $request->name;
        $category->ac_type_id = $request->ac_type_id;
        if($request->hasFile('img')){
            if(isset($request->old_img)){
                unlink('public/'.$request->old_img);
            }
            $category->img = $request->file('img')->store('backend/image/category', ['disk' => 'public_uploads']);
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
            $category->name = $category->id.$category->name;
            $category->save();            
            session()->flash('level', 'danger');
            session()->flash('msg', 'Delete Successfully');
        }
        return redirect()->back();
    }
}
