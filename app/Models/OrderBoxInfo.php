<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBoxInfo extends Model
{
    use HasFactory;

    protected $table = 'orderboxinfo_tbl';

    protected $fillable = [
        // 'order_id',
        'container_no',
        'box_type',
        'qnty',
        'box_charge',
        'box_dimension',
        'batch_no',
        'laod_date',
    ];

    public function orderinfo()
    {
        return $this->belongsTo(OrderInfo::class, 'order_id');
    }

    public function container()
    {
        return $this->belongsTo(Container::class, 'container_no', 'container_no');
    }
}
