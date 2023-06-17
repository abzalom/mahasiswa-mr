<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\StoreJabatanRequest;
use App\Models\Bank;
use App\Models\Jabatan;
use App\Models\JalurMasuk;
use App\Models\JenisPt;
use App\Models\Jenjang;
use App\Models\Peserta;
use App\Models\Tahun;
use App\Models\User;
use Spatie\Permission\Models\Role;


class AdminConfigProcessController extends Controller
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

    /**
     * CONFIG COMPONENTS
     */

    function savecomponents(Request $request)
    {
        /**
         * STORE TAHUN
         */
        if ($request->component == 'tahun') {
            $request->validate(
                [
                    'tahun' => 'required|unique:jalur_masuks,nama|numeric|digits:4'
                ],
                [
                    'tahun.required' => 'Tahun tidak boleh kosong',
                    'tahun.unique' => 'Tahun sudah ada',
                    'tahun.numeric' => 'Tahun harus berupa anggka',
                    'tahun.digits' => 'Tahun maksimal 4 giti, Contoh: ' . now('Y'),
                ]
            );
            Tahun::create([
                'tahun' => $request->tahun,
            ]);

            return back()->with('pesan', 'Tahun ' . $request->tahun . ' telah ditambahkan');
        }

        /**
         * STORE JALUR MASUK
         */
        if ($request->component == 'jalurmasuk') {
            $request->validate(
                [
                    'jalurmasuk' => 'required|unique:jalur_masuks,nama'
                ],
                [
                    'jalurmasuk.required' => 'Nama jalur masuk tidak boleh kosong',
                    'jalurmasuk.unique' => 'Nama jalur masuk sudah ada',
                ]
            );
            $jalurmasuk = JalurMasuk::create([
                'nama' => str($request->jalurmasuk)->lower()
            ]);

            return back()->with('pesan', 'Jalur masuk telah ditambahkan');
        }

        /**
         * STORE PERGURUAN TINGGI
         */
        if ($request->component == 'jenispt') {
            $request->validate(
                [
                    'jenispt' => 'required|unique:jenis_pts,nama'
                ],
                [
                    'jenispt.required' => 'Jenis Perguruan Tinggi tidak boleh kosong',
                    'jenispt.unique' => 'Jenis Perguruan Tinggi sudah ada',
                ]
            );
            JenisPt::create([
                'nama' => $request->jenispt
            ]);
            return back()->with('pesan', 'Jenis Perguruan Tinggi telah ditambahkan');
        }

        /**
         * STORE JENJANG
         */
        if ($request->component == 'jenjang') {
            $request->validate(
                [
                    'jenjang' => 'required|unique:jenjangs,nama',
                    'jjgtitle' => 'required|unique:jenjangs,singkat'
                ],
                [
                    'jenjang.required' => 'Jenjang tidak boleh kosong',
                    'jenjang.unique' => 'Jenjang sudah ada',
                    'jjgtitle.required' => 'Title tidak boleh kosong',
                    'jjgtitle.unique' => 'Title sudah ada',
                ]
            );
            // return $request->all();
            Jenjang::create([
                'nama' => $request->jenjang,
                'singkat' => str($request->jjgtitle)->upper(),
            ]);
            return back()->with('pesan', 'Jenjang telah ditambahkan');
        }
    }

    function updatecomponents(Request $request)
    {
        /**
         * UPDATE JALUR MASUK
         */
        if ($request->component == 'jalurmasuk') {
            $jalurmasuk = JalurMasuk::find($request->idjalur);
            $request->validate(
                [
                    'jalurmasuk' => 'required|unique:jalur_masuks,nama,' . $jalurmasuk->id,
                ],
                [
                    'jalurmasuk.required' => 'Nama jalur masuk tidak boleh kosong',
                    'jalurmasuk.unique' => 'Nama jalur masuk sudah ada',
                ]
            );
            $jalurmasuk->nama = $request->jalurmasuk;
            $jalurmasuk->save();
            return to_route('admin.config.components')->with('pesan', 'Jalur masuk telah diupdate');
        }

        /**
         * UPDATE PERGURUAN TINGGI
         */
        if ($request->component == 'jenispt') {
            $jenispt = JenisPt::find($request->idjenispt);
            $request->validate(
                [
                    'jenispt' => 'required|unique:jalur_masuks,nama,' . $jenispt->id,
                ],
                [
                    'jenispt.required' => 'Nama jenis perguruan tinggi tidak boleh kosong',
                    'jenispt.unique' => 'Nama jenis perguruan tinggi sudah ada',
                ]
            );
            $jenispt->nama = $request->jenispt;
            $jenispt->save();
            return to_route('admin.config.components')->with('pesan', 'Jenis Perguruan Tinggi telah diupdate');
        }

        /**
         * UPDATE JENJANG
         */
        if ($request->component == 'jenjang') {
            $jenjang = Jenjang::find($request->idjenjang);
            $request->validate(
                [
                    'jenjang' => 'required|unique:jenjangs,nama,' . $jenjang->id,
                    'jjgtitle' => 'required|unique:jenjangs,singkat,' . $jenjang->id,
                ],
                [
                    'jenjang.required' => 'Jenjang tidak boleh kosong',
                    'jenjang.unique' => 'Jenjang sudah ada',
                    'jjgtitle.required' => 'Title tidak boleh kosong',
                    'jjgtitle.unique' => 'Title sudah ada',
                ]
            );
            $jenjang->nama = $request->jenjang;
            $jenjang->singkat = str($request->jjgtitle)->upper();
            $jenjang->save();
            return to_route('admin.config.components')->with('pesan', 'Jenis Perguruan Tinggi telah diupdate');
        }
    }

    function destroycomponents(Request $request)
    {
        /**
         * DESTORY JALUR MASUK
         */
        if ($request->component == 'jalurmasuk') {
            $jalurmasuk = JalurMasuk::find($request->idjalur);
            $jalurmasuk->delete();
            return to_route('admin.config.components')->with('pesan', 'Jalur masuk telah dikunci');
        }
        if ($request->component == 'jenispt') {
            $jenispt = JenisPt::find($request->idjenispt);
            $jenispt->delete();
            return to_route('admin.config.components')->with('pesan', 'Jenis Perguruan Tinggi telah dikunci');
        }
    }

    function restorecomponents(Request $request)
    {
        /**
         * RESTORE JALUR MASUK
         */
        if ($request->component == 'jalurmasuk') {
            $jalurmasuk = JalurMasuk::onlyTrashed()->find($request->idjalur);
            $jalurmasuk->restore();
            return to_route('admin.config.components')->with('pesan', 'Jalur masuk telah dibuka');
        }
        if ($request->component == 'jenispt') {
            $jenispt = JenisPt::onlyTrashed()->find($request->idjenispt);
            $jenispt->restore();
            return to_route('admin.config.components')->with('pesan', 'Jalur masuk telah dibuka');
        }
    }
}
