<?php

namespace App\Http\Controllers\Admin\Config;

use App\Models\Bank;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\JalurMasuk;
use App\Models\JenisPt;
use App\Models\Jenjang;
use App\Models\KetOrtu;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Penghasilan;
use App\Models\Semester;
use App\Models\StatusAwalMahasiswa;
use App\Models\StatusMahasiswa;
use App\Models\StatusOrtu;
use App\Models\Tahun;
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
                'title' => 'Configurasi | Admin',
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
                'title' => 'Configurasi | Admin',
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
                'title' => 'Configurasi | Admin',
                'desc' => 'Config Data Pejabat',
            ],
        ]);
    }

    /**
     * App Component
     */
    public function createcomponents(Request $request)
    {
        $edittahun = null;
        $editjalur = null;
        $editjenispt = null;
        $editjenjang = null;
        $editketortu = null;
        $editpekerjaan = null;
        $editpendidikan = null;
        $editpenghasilan = null;
        $editsemester = null;
        $editstatusawalmhs = null;
        $editstatusmhs = null;
        $editstatusortu = null;
        if ($request->tahun) {
            $edittahun = Tahun::find($request->tahun);
        }
        if ($request->jalur) {
            $editjalur = JalurMasuk::find($request->jalur);
        }
        if ($request->jenispt) {
            $editjenispt = JenisPt::find($request->jenispt);
        }
        if ($request->jenjang) {
            $editjenjang = Jenjang::find($request->jenjang);
        }
        if ($request->ketortu) {
            $editketortu = KetOrtu::find($request->ketortu);
        }
        if ($request->pekerjaan) {
            $editpekerjaan = Pekerjaan::find($request->pekerjaan);
        }
        if ($request->pendidikan) {
            $editpendidikan = Pendidikan::find($request->pendidikan);
        }
        if ($request->penghasilan) {
            $editpenghasilan = Penghasilan::find($request->penghasilan);
        }
        if ($request->semester) {
            $editsemester = Semester::find($request->semester);
        }
        if ($request->statusawalmhs) {
            $editstatusawalmhs = StatusAwalMahasiswa::find($request->statusawalmhs);
        }
        if ($request->statusmhs) {
            $editstatusmhs = StatusMahasiswa::find($request->statusmhs);
        }
        if ($request->statusortu) {
            $editstatusortu = StatusOrtu::find($request->statusortu);
        }
        return view('admin.config.admin-config-components', [
            'web' => [
                'title' => 'Configurasi | Admin',
                'desc' => 'Config Data Tambahan',
            ],
            'tahuns' => Tahun::get(),
            'jalurmasuks' => JalurMasuk::withTrashed()->get(),
            'jenispts' => JenisPt::withTrashed()->get(),
            'jenjangs' => Jenjang::withTrashed()->get(),
            'ketortus' => KetOrtu::withTrashed()->get(),
            'pekerjaans' => Pekerjaan::withTrashed()->get(),
            'pendidikans' => Pendidikan::withTrashed()->get(),
            'penghasilans' => Penghasilan::withTrashed()->get(),
            'semesters' => Semester::withTrashed()->get(),
            'statusawalmhss' => StatusAwalMahasiswa::withTrashed()->get(),
            'statusmhss' => StatusMahasiswa::withTrashed()->get(),
            'statusortus' => StatusOrtu::withTrashed()->get(),

            'edittahun' => $edittahun,
            'editjalur' => $editjalur,
            'editjenispt' => $editjenispt,
            'editjenjang' => $editjenjang,
            'editketortu' => $editketortu,
            'editpekerjaan' => $editpekerjaan,
            'editpendidikan' => $editpendidikan,
            'editpenghasilan' => $editpenghasilan,
            'editsemester' => $editsemester,
            'editstatusawalmhs' => $editstatusawalmhs,
            'editstatusmhs' => $editstatusmhs,
            'editstatusortu' => $editstatusortu,
        ]);
    }
}
