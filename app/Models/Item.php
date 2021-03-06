<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class , 'item_id', 'id');
    }

    protected $fillable = ['item_name',
        'price',
        'stock',
        'description'];
}
