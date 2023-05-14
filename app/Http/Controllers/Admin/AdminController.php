<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

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

    public function createpanitia()
    {
        $panitias = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['koordinator', 'verifikator']);
        })->get();
        // dump(Carbon::now()->format('Y-m-d H:i:s'));
        return view('admin.manajament.admin-create-panitia', [
            'user' => User::find(auth()->user()->id),
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

    public function createroles()
    {
        $roles = Role::get();
        // return $roles;
        return view('admin.config.admin-config-roles', [
            'roles' => $roles,
            'web' => [
                'title' => 'Admin Panel',
                'desc' => 'Config Role and Permission',
            ],
        ]);
    }
}
