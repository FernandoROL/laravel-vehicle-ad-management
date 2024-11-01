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
        return view("pages.dashboard.paging");
    }
}
