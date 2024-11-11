<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestUser;
use App\Models\User;
use App\Services\Bootster;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function index(Request $request) {
        $search = $request->search;
        $results = $this->user->getUserSearchIndex(search: $search ?? '');

        return view('pages/users/paging', compact('results'));
    }
    
    public function registerUser(FormRequestUser $request) {
        if ($request->method() == 'POST') {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);

            Bootster::success('Created',   'User "'.$data["name"].'" created successfully!');

            return redirect()->route('users.index');
        }

        return view('pages.users.create');
    }

    public function updateUser(FormRequestUser $request, $id) {
        if ($request->method() == 'PUT') {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

            $searchRegistry = User::find($id);
            $searchRegistry->update($data);

            Bootster::success('Updated',   'User "'.$data["name"].'" updated successfully!');

            return redirect()->route('users.index');
        }

        $results = User::where('id', '=', $id)->first();

        return view('pages.users.update', compact('results'));
    }

    public function delete(Request $request) {
        $id = $request->id;
        $SearchRegistry = User::find($id);
        $SearchRegistry->delete();
        Bootster::error('Deleted',   '"'.$SearchRegistry["name"].'" was deleted!');
        return response()->json(['success' => true]);    
    }
}
