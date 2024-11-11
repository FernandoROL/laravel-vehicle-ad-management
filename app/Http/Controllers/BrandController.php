<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestBrand;
use App\Models\Brand;
use App\Models\User;
use App\Services\Bootster;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }
    public function index(Request $request)
    {
        $search = $request->search;
        $results = $this->brand->getBrandSearchIndex(search: $search ?? '');

        return view("pages.brands.paging", compact("results", "search"));
    }

    public function registerBrand(FormRequestBrand $request)
    {
        $users = User::all();

        if ($request->method() == "POST") {
            $data = $request->all();
            Brand::create($data);

            Bootster::success('Created', 'Brand "' . $data["name"] . '" created successfully!');

            return redirect()->route("brands.index");
        }

        return view('pages.brands.create', compact("users"));
    }

    public function updateBrand(FormRequestBrand $request, $id)
    {
        $users = User::all();
        if ($request->method() == 'PUT') {
            $data = $request->all();

            $searchRegistry = Brand::find($id);
            $searchRegistry->update($data);

            Bootster::success('Updated', '"' . $searchRegistry->name . '" was successfully updated!');

            return redirect()->route('brands.index');
        }
        $results = Brand::where('id', '=', $id)->first();

        return view('pages.brands.update', compact('results', 'users'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $SearchRegistry = Brand::find($id);
        $SearchRegistry->delete();
        Bootster::error('Deleted', '"' . $SearchRegistry["name"] . '" was deleted!');
        return response()->json(['success' => true]);
    }
}
