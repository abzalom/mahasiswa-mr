<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Jabatan;
use App\Models\Peserta;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function index(): RedirectResponse
    {
        $user = User::find(auth()->user()->id);
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->hasRole('koordinator')) {
            return redirect()->route('koordinator.dashboard');
        }
        if ($user->hasRole('verifikator')) {
            return redirect()->route('verifikator.dashboard');
        }
    }

    public function dashboard()
    {
        $users = new User;
        return view('admin.admin-dashboard', [
            'users' => $users,
            'pesertas' => Peserta::get(),
            'web' => [
                'title' => 'Admin Panel',
                'desc' => 'Dashboard',
            ],
        ]);
    }

    public function profile()
    {
        return view('admin.admin-profile', [
            'web' => [
                'title' => 'Admin Panel',
                'desc' => 'Dashboard',
            ],
        ]);
    }

    public function updateprofile(Request $request)
    {
        $request->validate(
            [
                'adminName' => 'required|max:20',
                'adminUsername' => 'required|max:10',
                'adminEmail' => 'required',
                'adminPhone' => 'required|numeric',
            ],
            [
                'adminName.required' => 'Nama tidak boleh kosong!',
                'adminName.max' => 'Pajang nama maksimal 20 karakter!',
                'adminUsername.required' => 'Username tidak boleh kosong!',
                'adminUsername.max' => 'Panjang username maksimal 20 karakter!',
                'adminEmail.required' => 'Email tidak boleh kosong!',
                'adminPhone.required' => 'Nomor Telepon tidak boleh kosong!',
            ]
        );
        $user = User::find(auth()->user()->id);
        $user->name = $request->adminName;
        $user->username = $request->adminUsername;
        $user->email = $request->adminEmail;
        $user->phone = $request->adminPhone;
        if ($request->file('adminImage')) {
            File::delete('images/' . $user->image);
            File::delete('images/thumbnails/' . $user->image);
            $file = $request->file('adminImage');
            $fileName = $user->id . '_' . $user->username . '.' . $file->getClientOriginalExtension();
            if ($file->storeAs('images', $fileName)) {
                $thumb = Image::make($file);
                $thumb->resize(128, 128, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumb->save('images/thumbnails/' . $fileName);
            }
            $user->image = $fileName;
        }
        $user->save();
        return back()->with('pesan', 'Profile berhasil diupdate');
    }

    public function createpanitia(Request $request)
    {
        $panitias = User::withTrashed()->whereHas('roles', function ($q) {
            $q->whereIn('name', ['koordinator', 'verifikator']);
        })->get();
        $editPanitia = collect([
            'name' => null,
            'username' => null,
            'email' => null,
            'phone' => null,
        ]);
        $edit = false;
        if ($request->id) {
            $edit = true;
            $editPanitia = User::find($request->id);
        }
        // return $editPanitia['name'];
        // dump(Carbon::now()->format('Y-m-d H:i:s'));
        return view('admin.manajament.admin-create-panitia', [
            'user' => User::find(auth()->user()->id),
            'editPanitia' => $editPanitia,
            'edit' => $edit,
            'panitias' => $panitias,
            'web' => [
                'title' => 'Admin Panel',
                'desc' => 'Panitia',
            ],
        ]);
    }

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
}
