<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "password",
        "status"
    ];

    public function getUserSearchIndex(string $search = '')
    {
        $user = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('name', $search);
                $query->orWhere('name', 'like', '%' . $search . '%');
            }
        })->get();

        return $user;
    }
}
