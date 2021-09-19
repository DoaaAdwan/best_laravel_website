<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{

    use HasFactory;
    protected $fillable =['parent_id','name','slug','image','status','url','status'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function categories(){
        return $this->hasMany(Category::class,'parent_id');
    }

    // public function subcategory()
    // {
    //     return $this->hasMany(Category::class, 'parent_id');
    // }

    // public function parent()
    // {
    //     return $this->belongsTo(\App\Models\Category::class, 'parent_id');
    // }


}
