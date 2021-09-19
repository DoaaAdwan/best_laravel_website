<?php

namespace App\Models;

use App\Models\Size;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    'product_id',
    'quantity',
    'size_id',
    'user_name',
    'product_name',
    'product_description',
'product_image',
'product_price',
'total_order',
'user_email',
'size_name',
'phone',
'address',
'text'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class,'status_id');
    }
}
