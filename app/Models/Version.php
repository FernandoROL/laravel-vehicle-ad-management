<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    protected $fillable = [
        "uniqueCode",
        "brandID",
        "modelID",
        "name",
        "description",
        "userID",
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicleModel() {
        return $this->belongsTo(VehicleModel::class);
    }
}
