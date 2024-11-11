<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    protected $fillable = [
        "uniqueCode",
        "brandID",
        "name",
        "description",
        "userID",
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getModelSearchIndex(string $search = '') {
        $models = $this->join('brands', 'vehicle_models.brandID', '=', 'brands.id')
        ->join('users','vehicle_models.userID','=','users.id')
            ->select(
                'vehicle_models.id',
                'vehicle_models.uniqueCode',
                'brands.name as brandName',
                'vehicle_models.name',
                'vehicle_models.description',
                'users.name as userName'
            )
            ->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('vehicle_models.name', $search)
                        ->orWhere('vehicle_models.name', 'like', '%' . $search . '%');
                }
            })
            ->orderBy('vehicle_models.id','asc')
            ->get();

        return $models;
    }
}
