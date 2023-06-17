<?php

namespace App\Http\Controllers\Configs;

use App\Http\Controllers\Controller;
use App\Models\Tahun;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function sessiontahun(Request $request)
    {
        $tahun = Tahun::find($request->idtahun);
        $request->session()->put('tahun', $tahun->tahun);
        return back();
    }
}
