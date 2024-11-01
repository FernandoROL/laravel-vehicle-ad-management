<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        "uniqueCode",
        "brandID",
        "modelID",
        "versionID",
        "typeID",
        "fipeCode",
        "color",
        "engine",
        "trunkSize",
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

    public function vehicleType() {
        return $this->belongsTo(VehicleType::class);
    }

    public function version() {
        return $this->belongsTo(Version::class);
    }
}
