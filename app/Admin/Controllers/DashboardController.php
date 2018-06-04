<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;

class DashboardController extends Controller
{
    

    public function index(Group $group)
    {
    	return view('admin.dashboard.index');
    }
}
