<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVehicleModel;
use App\Models\Brand;
use App\Models\User;
use App\Models\VehicleModel;
use App\Services\Bootster;
use Illuminate\Http\Request;

class VehicleModelController extends Controller
{
    public function __construct(VehicleModel $vehicleModel)
    {
        $this->vehicleModel = $vehicleModel;
    }
    public function index(Request $request)
    {
        $search = $request->search;
        $results = $this->vehicleModel->getModelSearchIndex(search: $search ?? '');

        return view("pages.vehicleModels.paging", compact("results", "search"));
    }

    public function registerModel(FormRequestVehicleModel $request)
    {
        $brands = Brand::all();
        $users = User::all();

        if ($request->method() == "POST") {
            $data = $request->all();
            VehicleModel::create($data);

            Bootster::success('Created', 'Model "' . $data['name'] . '" created successfully!');

            return redirect()->route("models.index");
        }

        return view('pages.vehicleModels.create', compact("brands", "users"));
    }

    public function updateModel(FormRequestVehicleModel $request, $id)
    {
        $users = User::all();
        $brands = Brand::all();
        if ($request->method() == 'PUT') {
            $data = $request->all();

            $searchRegistry = VehicleModel::find($id);
            $searchRegistry->update($data);

            Bootster::success('Updated', 'Model "' . $searchRegistry->name . '" was successfully updated !');

            return redirect()->route('models.index');
        }
        $results = VehicleModel::where('id', '=', $id)->first();

        return view('pages.vehicleModels.update', compact('results', 'brands', 'users'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $SearchRegistry = VehicleModel::find($id);
        $SearchRegistry->delete();
        Bootster::error('Deleted', '"' . $SearchRegistry["name"] . '" was deleted!');
        return response()->json(['success' => true]);
    }
}
