<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Status;
use App\Models\Category;
use App\Models\Featured;
use App\Models\NewArrivals;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = ['name','slug',
    'short_description',
    'description','regular_price',
    'sale_price','category_id',
    'size_id','status_id',
    'product_image',
'order_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function featured()
    {
        return $this->belongsTo(Featured::class);
    }
    public function newArrival()
    {
        return $this->belongsTo(NewArrivals::class);
    }
    public function popular()
    {
        return $this->belongsTo(Popular::class);
    }
}
