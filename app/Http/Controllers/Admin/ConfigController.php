<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\StoreJabatanRequest;
use App\Models\Bank;
use App\Models\Jabatan;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ConfigController extends Controller
{
    public function saveroles(Request $request)
    {
        // return $request->all();
        $request->validate(
            [
                'roleName' => 'required|unique:roles,name',
                'guardName' => 'required',
            ],
            [
                'roleName.required' => 'Nama role tidak boleh kosong!',
                'roleName.unique' => 'Nama role sudah ada!',
                'guardName.required' => 'Guard untuk role ' . $request->roleName . ' tidak boleh kosong!',
            ]
        );

        $role = Role::create(
            [
                'name' => $request->roleName,
                'guard_name' => $request->guardName,
            ]
        );

        if ($request->has('permissionName')) {
            foreach ($request->permissionName as $name) {
                $role->givePermissionTo($name);
            }
        }

        return back()->with('pesan', 'Role ' . $role->name . ' berhasil di tambahkan');
    }

    public function updateroles(Request $request)
    {
        $name = $request->name;
        $guard = $request->guard;

        $role = Role::where(['name' => $name, 'guard_name' => $guard])->first();
        $users = User::whereHas('roles', function ($query) use ($name, $guard) {
            $query->where(['name' => $name, 'guard_name' => $guard]);
        })->get();
        if ($guard == 'peserta') {
            $users = Peserta::whereHas('roles', function ($query) use ($name, $guard) {
                $query->where(['name' => $name, 'guard_name' => $guard]);
                // ->andWhere();
            })->get();
        }
        if ($users->count() == 0) {
            // return $request->guardName;
            $role->name = $request->roleName;
            $role->guard_name = $request->guardName;
            $role->save();
        }

        $role->syncPermissions($request->permissionName);

        return to_route('admin.config.roles')->with('pesan', 'Role dan Permissions ' . $role->name . ' berhasil di update');
    }

    public function destroyroles(Request $request)
    {
        $name = $request->role;
        $guard = $request->guard;
        $role = Role::where(['name' => $request->role, 'guard_name' => $request->guard])->first();
        $users = User::whereHas('roles', function ($query) use ($name, $guard) {
            $query->where(['name' => $name, 'guard_name' => $guard]);
        })->get();
        if ($guard == 'peserta') {
            $users = Peserta::whereHas('roles', function ($query) use ($name, $guard) {
                $query->where(['name' => $name, 'guard_name' => $guard]);
                // ->andWhere();
            })->get();
        }
        $sessionName = $role->name;
        if ($users->count() == 0) {
            $role->delete();
        } else {
            return to_route('admin.config.roles')->with('pesan', 'Role ' . $sessionName . ' tidak dapat dihapus karena sudah mempunyai rule user dan peserta');
        }

        return to_route('admin.config.roles')->with('pesan', 'Role ' . $sessionName . ' berhasil di update');
    }

    public function savebanks(StoreBankRequest $request)
    {
        $validated = $request->validated();
        $bank = Bank::create($validated);
        return to_route('admin.config.banks')->with('pesan', 'Data Bank ' . $bank->kode . ' - ' . $bank->nama . ' berhasil di tambahkan');
    }

    public function updatebanks(StoreBankRequest $request)
    {
        $validated = $request->validated();
        $bank = Bank::find($request->id);
        $bank->kode = $request->kode;
        $bank->nama = $request->nama;
        $bank->save();
        return to_route('admin.config.banks')->with('pesan', 'Data Bank ' . $bank->kode . ' - ' . $bank->nama . ' berhasil di update!');
    }

    public function destroybanks(Request $request)
    {
        $bank = Bank::find($request->id);
        if ($bank->peserta->count()) {
            return to_route('admin.config.banks')->with('pesan', 'Data Bank ' . $bank->kode . ' - ' . $bank->nama . ' tidak dapat dihapus karena sudah ada peserta yang menggunakan!');
        }
        $bank->delete();
        return to_route('admin.config.banks')->with('pesan', 'Data Bank telah dihapus!');
    }

    public function savepejabats(StoreJabatanRequest $request)
    {
        $validated = $request->validated();
        $pejabat = Jabatan::create($validated);
        return back()->with('pesan', 'Nama Pejabat ' . $pejabat->nama . ' telah di tambahkan!');
    }

    public function updatepejabats(StoreJabatanRequest $request)
    {
        $validated = $request->validated();
        $pejabat = Jabatan::find($request->id);
        $pejabat->nama = $request->nama;
        $pejabat->jabatan = $request->jabatan;
        $pejabat->nip = $request->nip;
        $pejabat->save();
        return to_route('admin.config.pejabats')->with('pesan', 'Nama Pejabat ' . $pejabat->nama . ' telah di update!');
    }

    public function destroypejabats(Request $request)
    {
        $pejabat = Jabatan::find($request->id);
        $pejabat->delete();
        return back()->with('pesan', 'Data Pejabat telah di hapus!');
    }
}
