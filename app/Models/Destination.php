<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = "destination_tbl";

    protected $fillable = [
        "destination"
    ];

    public function boxcharges()
    {
        return $this->hasMany(OrderInfo::class, 'destination', 'destination');
    }

    public function orders()
    {
        return $this->hasMany(OrderInfo::class, 'destination', 'id');
    }
}
