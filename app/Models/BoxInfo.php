<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        "box_type",
        "box_dimension",
    ];
    protected $table = "boxinfo_tbl";

    public function boxcharges()
    {
        return $this->hasMany(BoxCharges::class, 'box_type', 'box_type');
    }
}
