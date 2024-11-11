<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $userVehicle = $this->userVehicle();
        $brandVehicle = $this->brandVehicle();
        $brandModelVersion = $this->brandModelVersion();
        $vehicleBrands =  $this->vehicleBrands();
        $inactiveListings = $this->inactiveListings();
        $inactiveuserListings = $this->inactiveuserListings();
        return view("pages.dashboard.paging", compact('userVehicle', 'brandVehicle', 'brandModelVersion', 'vehicleBrands', 'inactiveuserListings', 'inactiveListings'));
    }

    public function userVehicle() {
        $results = DB::select('
            SELECT 
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
        return $results;
    }

    public function brandVehicle() {
        $results = DB::select('
            SELECT 
                brands.name AS brandName,
                COUNT(vehicles.id) AS vehicleCount
            FROM 
                brands
            LEFT JOIN 
                vehicles ON brands.id = vehicles.brandID
            GROUP BY 
                brands.id
            ORDER BY 
                vehicleCount DESC
        ');
        return $results;
    }

    public function brandModelVersion() {
        $results = DB::select('
            SELECT 
                brands.name AS brandName,
                COUNT(DISTINCT vehicle_models.id) AS ModelCount,
                COUNT(DISTINCT versions.id) AS VersionCount,
                (COUNT(DISTINCT vehicle_models.id) + COUNT(DISTINCT versions.id)) AS MVs
            FROM 
                brands
            LEFT JOIN 
                vehicle_models ON brands.id = vehicle_models.brandID
            LEFT JOIN
                versions ON brands.id = versions.brandID
            GROUP BY 
                brands.id
            ORDER BY 
                MVs DESC
        ');
        return $results;
    }

    public function vehicleBrands() {
        $results = DB::select('
            SELECT 
                vehicles.fipeCode AS fipeCode,
                brands.name AS brandName
            FROM 
                vehicles
            JOIN 
                brands ON vehicles.brandID = brands.id;
        ');
        return $results;
    }

    public function inactiveListings() {
        $results = DB::select('
            SELECT 
                vehicles.id AS vehicleID,
                vehicles.uniqueCode AS vehicleCode,
                vehicles.updated_at AS lastUpdate
            FROM 
                vehicles
            LEFT JOIN 
                comments ON vehicles.id = comments.vehicleID
            WHERE 
                vehicles.updated_at <= NOW() - INTERVAL 60 DAY
                AND (
                    comments.created_at IS NULL 
                    OR comments.created_at <= NOW() - INTERVAL 60 DAY
                )
            GROUP BY 
                vehicles.id
            HAVING 
                COUNT(comments.id) = 0 
                OR MAX(comments.created_at) <= NOW() - INTERVAL 60 DAY;
        ');
        return $results;
    }

    public function inactiveuserListings() {
        $results = DB::table('vehicles')
            ->join('users', 'vehicles.userID', '=', 'users.id')
            ->select(
                'vehicles.uniqueCode AS vehicleCode',
                'users.name AS userName',
                'users.email AS userEmail'
            )
            ->where('users.status', false)
            ->get();
        return $results;
    }
}
