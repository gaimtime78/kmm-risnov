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

class UserController extends Controller
{
	public function index(){
		$data = User::all();
		// dd($data);
		return view('admin.user.index',	 ['data' => $data]);
	}

	public function create(){
		$role = Role::all();
		return view('admin.user.create', ['role' => $role]);
	}

	public function store(Request $request){
		// dd(count($request->role));
		$user = new User([
			'name' => $request->name,
    	'email' => $request->email,
			'email_verified_at' => date('Y-m-d H:i:s'),
			'password' => Hash::make($request->password),
			'role_id' => count($request->role) > 0?$request->role[0]:NULL,
		]);
		if($user->save()){
      return redirect(route('admin.user.index'))->with('message', 'berhasil');
		}else{
      return redirect(route('admin.user.index'))->with('message', 'gagal');
    }
	}

	public function edit ($id) {
		$data = User::find($id);
		return view('admin.user.edit', ['data' => $data, 'role' => Role::all()]);
	}

	public function update (Request $request, $id){
		$user = User::find($id);
		// dd($request->all());
		$dataUpdate = [
			'name' => $request->name,
    	'email' => $request->email,
			'email_verified_at' => date('Y-m-d H:i:s'),
			'password' => $request->password?Hash::make($request->password):$user->password,
			'role_id' => count($request->role) > 0?$request->role[0]:NULL,
		];

		if($user->update($dataUpdate)){
			$message = 'berhasil';
		}else{
			$message = 'gagal';
		}

		return redirect(route('admin.user.index'))->with('message', $message);

	}
	
}
