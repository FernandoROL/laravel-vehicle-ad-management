<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        "uniqueCode",
        "name",
        "description",
        "userID",
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getBrandSearchIndex(string $search = '') {
        $brand = $this->join('users','brands.userID','=','users.id')
            ->select(
                'brands.id',
                'brands.uniqueCode',
                'brands.name',
                'brands.description',
                'users.name as userName',
            )
            ->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('brands.name', $search)
                        ->orWhere('brands.name', 'like', '%' . $search . '%');
                }
            })
            ->orderBy('brands.id','asc')
            ->get();

        return $brand;
    }
}
