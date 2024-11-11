<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVehicleType;
use App\Models\VehicleType;
use App\Services\Bootster;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    public function __construct(VehicleType $vehicleType)
    {
        $this->vehicleType = $vehicleType;
    }
    public function index(Request $request)
    {
        $search = $request->search;
        $results = $this->vehicleType->getTypeSearchIndex(search: $search ?? '');

        return view("pages.vehicleTypes.paging", compact("results", "search"));
    }

    public function registerType(FormRequestVehicleType $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->all();
            $this->vehicleType->create($data);

            Bootster::success('Created', 'Type "' . $data['name'] . '" created successfully!');

            return redirect()->route('types.index');
        }

        return view('pages.vehicleTypes.create');

    }

    public function updateType(FormRequestVehicleType $request, $id)
    {
        if ($request->method() == 'PUT') {
            $data = $request->all();

            $searchRegistry = VehicleType::find($id);
            $searchRegistry->update($data);

            Bootster::success('Updated', 'Type was successfully updated to "' . $searchRegistry->name . '"!');

            return redirect()->route('types.index');
        }
        $results = VehicleType::where('id', '=', $id)->first();

        return view('pages.vehicleTypes.update', compact('results'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $SearchRegistry = VehicleType::find($id);
        $SearchRegistry->delete();
        Bootster::error('Deleted', '"' . $SearchRegistry["name"] . '" was deleted!');
        return response()->json(['success' => true]);
    }
}
