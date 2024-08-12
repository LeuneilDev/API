<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = "branch_tbl";

    protected $fillable = [
        // "branch_id",
        "branch_name",
        "branch_code",
        "owner",
        "contact",
        "address",
        "email",
        "status",
    ];

    public function containers()
    {
        return $this->hasMany(Container::class, 'branch_assigned', 'id');
    }

    public function orders()
    {
        return $this->hasMany(OrderInfo::class, 'branch_assigned', 'id');
    }

    public function boxcharges()
    {
        return $this->hasMany(BoxCharges::class, 'branch_assigned', 'id');
    }
}
