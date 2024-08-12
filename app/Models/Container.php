<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    protected $table = "container_tbl";

    protected $fillable = [
        "container_no",
        "branch_assigned",
        "capacity",
        "boxes",
        "status",
    ];

    public function orderboxinfo()
    {
        return $this->hasMany(OrderBoxInfo::class, 'container_no', 'container_no');
    }
}
