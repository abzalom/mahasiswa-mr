<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\PesertaUser;
use App\Models\Verified;
use Illuminate\Http\Request;

class VerifiedPesertaController extends Controller
{
    public function verification(Request $request)
    {
        $peserta = Peserta::find($request->peserta_id);
        $pivot = PesertaUser::where(['peserta_id' => $request->peserta_id, 'user_id' => $request->user_id])->get('id')->first();
        Verified::create([
            'peserta_user_id' => $pivot->id,
            'verify_status_id' => $request->status,
            'keterangan' => $request->keterangan,
        ]);
        if ($request->status == 1) {
            $peserta->kirim = true;
        }
        if ($request->status == 2) {
            $peserta->kirim = false;
        }
        $peserta->save();
        return to_route('verifikator.man.peserta')->with('pesan', 'Peserta dengan nama ' . $peserta->nama . ' telah diverifikasi');
    }

    public function perbaikanverification(Request $request)
    {
        // return $request->all();
        $peserta = Peserta::find($request->peserta_id);
        $pivot = PesertaUser::where(['peserta_id' => $request->peserta_id, 'user_id' => $request->user_id])->get('id')->first();
        Verified::create([
            'peserta_user_id' => $pivot->id,
            'verify_status_id' => $request->status,
            'keterangan' => $request->keterangan,
        ]);
        if ($request->status == 1) {
            $peserta->kirim = true;
        }
        if ($request->status == 2) {
            $peserta->kirim = false;
        }
        $peserta->save();
        return to_route('verifikator.manperbaikan.peserta')->with('pesan', 'Peserta dengan nama ' . $peserta->nama . ' telah diverifikasi');
    }
}
