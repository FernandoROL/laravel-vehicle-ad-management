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

    public function getVersionSearchIndex(string $search = '') {
        $versions = $this->join('brands', 'versions.brandID', '=', 'brands.id')
        ->join('users','versions.userID','=','users.id')
        ->join('vehicle_models','versions.modelID','=','vehicle_models.id')
            ->select(
                'versions.id',
                'versions.uniqueCode',
                'brands.name as brandName',
                'versions.name',
                'versions.description',
                'users.name as userName',
                'vehicle_models.name as modelName',
            )
            ->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('versions.name', $search)
                        ->orWhere('versions.name', 'like', '%' . $search . '%');
                }
            })
            ->orderBy('versions.id','asc')
            ->get();

        return $versions;
    }
}
