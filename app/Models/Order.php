<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'status', 'description'];

    // علاقة الطلب مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة الطلب مع المنتج
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
