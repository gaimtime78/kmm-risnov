<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\Permission;

class DashboardController extends Controller
{
	public function index(){
    // $permission = Auth::user()->role->permissions;
    // $arrPermission = [];
    // foreach($permission as $value){
    //   array_push($arrPermission, $value->permission);
    // }
		return view('dashboard');
	}
	
}
