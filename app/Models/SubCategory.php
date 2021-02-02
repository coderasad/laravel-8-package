<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cat_id',
        'ac_type_id',
        'status'
    ];
    public function cat(){
        return $this->belongsTo('App\Models\Category','cat_id')->where('status',1);
    }
    public function child(){
        return $this->hasOne('App\Models\ChildCategory','subcat_id')->where('status',1);
    }
    public function actype(){
        return $this->belongsTo('App\Models\Actype', 'ac_type_id');
    }
    
    public function products() {
        return $this->hasMany(Product::class,'subcat_id')->where('status',1);
    }
    
    public function merProducts(){
        return $this->hasMany('App\Models\MerProduct', 'product_id')->where('admin_approved',1)->where('show_pro',1);
    }
}
