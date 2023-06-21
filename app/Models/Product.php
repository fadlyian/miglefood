<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
        'stock',
        'price',
        'image',
    ];

    public function category(){
        return $this->hasOne(Category::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function orderDetail(){
        return $this->hasMany(OrderDetail::class);
    }
}
