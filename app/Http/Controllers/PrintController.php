<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Peserta;
use App\Models\PesertaUser;
use App\Models\User;
use App\Models\Verified;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function formulircetak($id)
    {
        $peserta = auth()->user()->pesertas->where('id', $id)->first();
        // return $peserta;
        if (!$peserta) {
            return to_route('verifikator.manlengkap.peserta');
        }
        if (!$peserta->verified->count()) {
            return to_route('verifikator.manlengkap.peserta');
        }
        if ($peserta->verified->last()->status->name !== 'LENGKAP') {
            return to_route('verifikator.manlengkap.peserta');
        }
        return view('cetak.cetak3-formulir', [
            'peserta' => $peserta,
            'jabatan' => Jabatan::find(3),
            'carbon' => new Carbon,
        ]);

        // $pdf = Pdf::loadView('cetak.cetak3-formulir', [
        //     'peserta' => $peserta,
        // ]);

        // return $peserta->toArray();

        // $pdf = Pdf::loadView('cetak.cetak3-formulir', ['peserta' => $peserta])->setPaper('a4', 'landscape');
        // return $pdf->stream();
        // exit(0);
    }
}
