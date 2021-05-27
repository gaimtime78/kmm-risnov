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

class PermissionController extends Controller
{
	public function index(){
		$data = Role::all();
    // dd($role->permissions[0]->permission);
    // dd($data->permissions);
		return view('admin.permission.index',	 ['data' => $data]);
	}

	public function create(){
		$role = Role::all();
    $permission = Permission::all();
		return view('admin.permission.create', ['role' => $role, 'permission' => $permission]);
	}

	public function store(Request $request){
		// dd($request->all());
		$role = new Role([
			'name' => $request->name,
		]);
		if($role->save()){
      $role_id = $role->id;
      $permissionArr = [];
      foreach($request->permission as $value){
        array_push($permissionArr, [
          'role_id' => $role_id,
          'permission_id' => (int)$value
        ]);
      }
      $saveRolePermission = RolePermission::insert($permissionArr);
      if($saveRolePermission){
        return redirect(route('admin.permission.index'))->with('message', 'berhasil');
      }else{
        return redirect(route('admin.permission.index'))->with('message', 'gagal');
      }
		}else{
      return redirect(route('admin.permission.index'))->with('message', 'gagal');
    }
	}

	public function edit ($id) {
		$data = Role::find($id);
		return view('admin.permission.edit', ['data' => $data, 'permission' => Permission::all()]);
	}

	public function update (Request $request, $id){
		$role = Role::find($id);
		// dd($request->all());
		$dataUpdate = [
			'name' => $request->name,
		];

		if($role->update($dataUpdate)){
      $deleteRolePermission = RolePermission::where('role_id', $id)->delete();
      if($deleteRolePermission){
        $permissionArr = [];
        foreach($request->permission as $value){
          array_push($permissionArr, [
            'role_id' => $id,
            'permission_id' => (int)$value
          ]);
        }
        $saveRolePermission = RolePermission::insert($permissionArr);
        if($saveRolePermission){
          $message = "Berhasil";
        }else{
          $message = "Gagal";
        }
      }
		}else{
			$message = 'gagal';
		}

		return redirect(route('admin.permission.index'))->with('message', $message);

	}

  public function delete (Request $request, $id){
		$role = Role::find($id);
		if($role->delete()){
      $deleteRolePermission = RolePermission::where('role_id', $id)->delete();
      $message = 'berhasil';
		}else{
			$message = 'gagal';
		}

		return redirect(route('admin.permission.index'))->with('message', $message);

	}
	
}
