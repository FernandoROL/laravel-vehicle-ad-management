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
}
