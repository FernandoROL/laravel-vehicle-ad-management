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

    public function vehicleModel()
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function version()
    {
        return $this->belongsTo(Version::class);
    }

    public function getVehicleSearchIndex(string $search = '')
    {
        $vehicles = $this->join('brands', 'vehicles.brandID', '=', 'brands.id')
            ->join('vehicle_models', 'vehicles.modelID', '=', 'vehicle_models.id')
            ->join('versions', 'vehicles.versionID', '=', 'versions.id')
            ->join('vehicle_types', 'vehicles.typeID', '=', 'vehicle_types.id')
            ->select(
                'vehicles.id',
                'vehicles.uniqueCode',
                'vehicles.fipeCode',
                'vehicles.color',
                'vehicles.engine',
                'vehicles.trunkSize',
                'brands.name as brandName',
                'vehicle_models.name as modelName',
                'versions.name as versionName',
                'vehicle_types.name as typeName'
            )
            ->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('vehicles.uniqueCode', $search)
                        ->orWhere('vehicles.uniqueCode', 'like', '%' . $search . '%');
                }
            })
            ->get();

        return $vehicles;
    }

}
