<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'category_img',
        'status'
    ];

    public function subcat(){
        return $this->hasMany(SubCategory::class,'cat_id')->where('status',1);
    }

    public function products() {
        return $this->hasMany(Product::class,'cat_id')->where('status',1);
    }
}
