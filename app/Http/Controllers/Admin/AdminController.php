<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

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
}
