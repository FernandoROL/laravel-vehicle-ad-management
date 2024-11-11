<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "body",
        "vehicleID",
        "userID",
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }
    public function getCommentSearchIndex(string $search = '') {
        $comments = $this->join('vehicles', 'comments.vehicleID', '=', 'vehicles.id')
        ->join('users','comments.userID','=','users.id')
            ->select(
                'comments.id',
                'comments.title',
                'comments.body',
                'vehicles.uniqueCode as vehicleCode',
                'users.name as userName',
            )
            ->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('comments.title', $search)
                        ->orWhere('comments.title', 'like', '%' . $search . '%');
                }
            })
            ->orderBy('comments.id','asc')
            ->get();

        return $comments;
    }
}
