<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVehicle;
use App\Models\Brand;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use App\Models\Version;
use App\Services\Bootster;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $results = $this->vehicle->getVehicleSearchIndex(search: $search ?? '');

        return view('pages/vehicles/paging', compact('results'));
    }

    public function registervehicle(FormRequestVehicle $request)
    {
        $brands = Brand::all();
        $models = VehicleModel::all();
        $versions = Version::all();
        $types = VehicleType::all();
        $users = User::all();

        if ($request->method() == 'POST') {
            $data = $request->all();
            Vehicle::create($data);

            Bootster::success('Created', 'Vehicle "' . $data["uniqueCode"] . '" created successfully!');

            return redirect()->route('vehicles.index');
        }

        return view('pages.vehicles.create', compact('brands', 'models', 'versions', 'types', 'users'));
    }


    public function updateVehicle(FormRequestVehicle $request, $id)
    {
        $brands = Brand::all();
        $models = VehicleModel::all();
        $versions = Version::all();
        $types = VehicleType::all();
        $users = User::all();

        if ($request->method() == 'PUT') {
            $data = $request->all();

            $searchRegistry = Vehicle::find($id);
            $searchRegistry->update($data);

            Bootster::success('Updated', '"' . $searchRegistry->uniqueCode . '" was successfully updated!');

            return redirect()->route('vehicles.index');
        }

        $results = Vehicle::where('id', '=', $id)->first();

        return view('pages.vehicles.update', compact('results', 'brands', 'models', 'versions', 'types', 'users'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $SearchRegistry = Vehicle::find($id);
        $SearchRegistry->delete();
        Bootster::error('Deleted', '"' . $SearchRegistry["uniqueCode"] . '" was deleted!');
        return response()->json(['success' => true]);
    }
}
