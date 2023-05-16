<?php

namespace App\Http\Controllers\Admin\Config;

use App\Models\Bank;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class AdminConfigController extends Controller
{

    /**
     * ROLES & PERMISION
     */

    public function createroles(Request $request)
    {
        // return $roles;
        $roles = Role::get();
        $permissions = Permission::where('guard_name', 'web')->get();
        $getOneRole = '';
        $users = '';
        $edit = false;
        if ($request->has('roleName')) {
            $roleName = $request->roleName;
            $guardName = $request->guardName;
            $permissions = Permission::where('guard_name', $guardName)->get();
            $getOneRole = Role::where(['name' => $roleName, 'guard_name' => $guardName])->firstOrFail();
            if ($guardName == 'web') {
                $users = User::whereHas('roles', function ($query) use ($roleName, $guardName) {
                    $query->where(['name' => $roleName, 'guard_name' => $guardName]);
                })->get();
            }
            if ($guardName == 'peserta') {
                $users = Peserta::whereHas('roles', function ($query) use ($roleName, $guardName) {
                    $query->where(['name' => $roleName, 'guard_name' => $guardName]);
                    // ->andWhere();
                })->get();
            }
            $edit = true;
        }
        return view('admin.config.admin-config-roles', [
            'roles' => $roles,
            'users' => $users,
            'getOneRole' => $getOneRole,
            'permissions' => $permissions,
            'edit' => $edit,
            'web' => [
                'title' => 'Admin Panel',
                'desc' => 'Config Role and Permission',
            ],
        ]);
    }

    /**
     * Bank
     */

    public function createbanks(Request $request)
    {
        $banks = Bank::get();
        $getOneBank = '';
        if ($request->has('id')) {
            $getOneBank = Bank::find($request->id);
        }
        return view('admin.config.admin-config-banks', [
            'banks' => $banks,
            'getOneBank' => $getOneBank,
            'web' => [
                'title' => 'Admin Panel',
                'desc' => 'Config Data Bank',
            ],
        ]);
    }

    /**
     * Jabatan
     */

    public function createpejabats(Request $request)
    {
        $pejabats = Jabatan::get();
        $getOnePejabat = [];
        if ($request->id) {
            $getOnePejabat = Jabatan::find($request->id);
        }
        // return $getOnePejabat;
        return view('admin.config.admin-config-pejabats', [
            'pejabats' => $pejabats,
            'getOnePejabat' => $getOnePejabat,
            'web' => [
                'title' => 'Admin Panel',
                'desc' => 'Config Data Pejabat',
            ],
        ]);
    }

    /**
     * App Component
     */
    public function createcomponents()
    {
        return view('admin.config.admin-config-components', [
            'web' => [
                'title' => 'Admin Panel',
                'desc' => 'Config Data Pejabat',
            ],
        ]);
    }
}
