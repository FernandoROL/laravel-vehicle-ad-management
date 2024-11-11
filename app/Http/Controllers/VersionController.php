<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVersion;
use App\Models\Brand;
use App\Models\User;
use App\Models\VehicleModel;
use App\Models\Version;
use App\Services\Bootster;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    public function __construct(Version $version)
    {
        $this->version = $version;
    }
    public function index(Request $request)
    {
        $search = $request->search;
        $results = $this->version->getVersionSearchIndex(search: $search ?? '');

        return view("pages.versions.paging", compact("results", "search"));
    }

    public function registerVersion(FormRequestVersion $request)
    {
        $brands = Brand::all();
        $users = User::all();
        $models = VehicleModel::all();

        if ($request->method() == "POST") {
            $data = $request->all();
            Version::create($data);

            Bootster::success('Created', 'Version "' . $data['name'] . '" created successfully!');

            return redirect()->route("versions.index");
        }

        return view('pages.versions.create', compact("brands", "users", "models"));
    }

    public function updateVersion(FormRequestVersion $request, $id)
    {
        $users = User::all();
        $brands = Brand::all();
        $models = VehicleModel::all();
        if ($request->method() == 'PUT') {
            $data = $request->all();

            $searchRegistry = Version::find($id);
            $searchRegistry->update($data);

            Bootster::success('Updated', 'Version "' . $searchRegistry->name . '" was successfully updated !');

            return redirect()->route('versions.index');
        }
        $results = Version::where('id', '=', $id)->first();

        return view('pages.versions.update', compact('results', 'brands', 'models', 'users'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $SearchRegistry = Version::find($id);
        $SearchRegistry->delete();
        Bootster::error('Deleted', '"' . $SearchRegistry["name"] . '" was deleted!');
        return response()->json(['success' => true]);
    }
}
