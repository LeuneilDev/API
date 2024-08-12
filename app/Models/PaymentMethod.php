<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = "paymentmethod_tbl";

    protected $fillable = [
        'payment_method'
    ];

    public function orders()
    {
        return $this->hasMany(OrderInfo::class, 'payment_method', 'id');
    }
}
