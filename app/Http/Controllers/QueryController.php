<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function showUserVehicleCount()
    {
        $results = DB::select('
            SELECT 
                users.id AS userID,
                users.name AS userName,
                COUNT(vehicles.id) AS vehicleCount
            FROM 
                users
            LEFT JOIN 
                vehicles ON users.id = vehicles.userID
            GROUP BY 
                users.id
            ORDER BY 
                vehicleCount DESC
        ');

        return view('pages.reports.01', compact('results'));
    }
}
