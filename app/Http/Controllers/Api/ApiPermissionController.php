<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class ApiPermissionController extends Controller
{
    public function permissionbyguard(Request $request)
    {
        // return $request->all();
        return Permission::where('guard_name', $request->guard_name)->get();
    }
}
