<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    public function getTypeSearchIndex(string $search = '') {
        $types = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('name', $search);
                $query->orWhere('name', 'like', '%' . $search . '%');
            }
        })->get();

        return $types;
    }
}
