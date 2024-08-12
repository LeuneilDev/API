<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $table = "tracking_tbl";

    protected $fillable = [
        'order_id',
        'invoice_no',
        'container_no',
        'location',
        'status',
    ];

    public function orderinfo()
    {
        return $this->belongsTo(OrderInfo::class, 'order_id');
    }
}
