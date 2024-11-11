<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
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

    public function showBrandVehicleCount()
    {
        $results = DB::select('
            SELECT 
                brands.id AS brandID,
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

        return view('pages.reports.02', compact('results'));
    }

    public function showBrandModelVersionCount()
    {
        $results = DB::select('
            SELECT 
                brands.id AS brandID,
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

        return view('pages.reports.03', compact('results'));
    }

    public function showVehicleBrandName()
    {
        $results = DB::select('
            SELECT 
                vehicles.id AS vehicleID,
                vehicles.fipeCode AS fipeCode,
                brands.name AS brand_name
            FROM 
                vehicles
            JOIN 
                brands ON vehicles.brandID = brands.id;

        ');

        return view('pages.reports.04', compact('results'));
    }

    public function showVehicleBrandTypeSort(Request $request)
    {
        $brand = $request->input('brand');
        $type = $request->input('type');

        $results = DB::table('vehicles')
            ->join('brands', 'vehicles.brandID', '=', 'brands.id')
            ->join('vehicle_types', 'vehicles.typeID', '=', 'vehicle_types.id')
            ->select(
                'vehicles.uniqueCode AS vehicleCode',
                'vehicles.fipeCode AS fipeCode',
                'vehicles.color AS color',
                'vehicles.engine AS engine',
                'vehicles.trunkSize AS trunkSize',
                'brands.name AS brandName',
                'vehicle_types.name AS typeName'
            )
            ->when($brand, function ($query, $brand) {
                return $query->where('brands.name', 'LIKE', "%$brand%");
            })
            ->when($type, function ($query, $type) {
                return $query->where('vehicle_types.name', 'LIKE', "%$type%");
            })
            ->get();

        return view('pages.reports.05', compact('results'));
    }

    public function showInactiveUserListings()
    {
        $results = DB::table('vehicles')
            ->join('users', 'vehicles.userID', '=', 'users.id')
            ->select(
                'vehicles.uniqueCode AS vehicleCode',
                'users.name AS userName',
                'users.email AS userEmail'
            )
            ->where('users.status', false)
            ->get();

        return view('pages.reports.06', compact('results'));
    }

    public function showUserCommentByID(Request $request)
    {
        $vehicles = Vehicle::all();
        $vehicleID = $request->input('vehicleID');

        $results = DB::table('comments')
            ->join('users', 'comments.userID', '=', 'users.id')
            ->join('vehicles', 'comments.vehicleID', '=', 'vehicles.id')
            ->select(
                'comments.id AS commentID',
                'users.name AS commenter',
                'comments.created_at AS commentDate',
                'comments.title AS commentTitle',
                'comments.body AS commentBody',
            )
            ->when($vehicleID, function ($query, $vehicleID) {
                return $query->where('comments.vehicleID', 'LIKE', "%$vehicleID%");
            })
            ->get();




        return view('pages.reports.07', compact('results', 'vehicles'));
    }

    public function showInactiveListings()
    {
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

        return view('pages.reports.08', compact('results'));
    }
}
