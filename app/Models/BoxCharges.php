<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxCharges extends Model
{
    use HasFactory;

    protected $table = "box_charges_tbl";

    protected $fillable = [
        "destination",
        "box_type",
        "box_charge",
        "branch",
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination', 'destination');
    }
}
