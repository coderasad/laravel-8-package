<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategory;
use App\Models\Actype;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $data['category'] = category::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('backend.pages.sub-category.index')->with($data);
    }

    // store 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:100',
            'ac_type_id' => 'required',
            'img' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->ac_type_id = $request->ac_type_id;
        if($request->hasFile('img')){
            $category->img  = $request->file('img')->store('backend/image/category',['disk' => 'public_uploads']);  
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
