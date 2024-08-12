<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    use HasFactory;

    protected $table = 'orderinfo_tbl';

    protected $fillable = [
        'invoice_no',
        'agent_code',
        'sender_name',
        'sender_address',
        'sender_contact',
        'sender_email',
        'receiver_name',
        'receiver_address',
        'receiver_contact',
        'receiver_email',
        'destination',
        'request_status',
        'order_status',
        'declared_value',
        'total_value',
        'total_payment',
        'payment_method',
        'branch_assigned',
    ];

    protected $guarded = [
        'request_info_at',
        'order_status_at',
    ];

    public function orderboxinfo()
    {
        return $this->hasMany(OrderBoxInfo::class, 'order_id');
    }

    public function tracking()
    {
        return $this->hasMany(Tracking::class, 'order_id');
    }
}
