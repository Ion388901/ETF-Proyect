<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class DashboardController extends BaseController {
    public function index(Request $req) {
        return view('admin.dashboard.index');
    }
}