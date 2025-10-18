<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HealthRecord;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalRecords = HealthRecord::count();
        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalUsers', 'totalRecords', 'recentUsers'));
    }

    public function users()
    {
        $users = User::with('roles')->latest()->get();
        return view('admin.users', compact('users'));
    }

    public function allHealthRecords()
    {
        $healthRecords = HealthRecord::with('user')->latest()->get();
        return view('admin.health-records', compact('healthRecords'));
    }

    public function toggleRole(User $user)
    {
        // Prevent self-role-change
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users')
                ->with('error', 'Tidak dapat mengubah peran Anda sendiri!');
        }

        if ($user->hasRole('admin')) {
            $user->removeRole('admin');
            $user->assignRole('user');
            $message = "Pengguna {$user->name} sekarang adalah pengguna biasa";
        } else {
            $user->removeRole('user');
            $user->assignRole('admin');
            $message = "Pengguna {$user->name} sekarang adalah admin";
        }

        return redirect()->route('admin.users')->with('success', $message);
    }

    public function destroyUser(User $user)
    {
        // Prevent self-delete
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users')
                ->with('error', 'Tidak dapat menghapus akun Anda sendiri!');
        }

        // Optional: Delete user's health records first
        $user->healthRecords()->delete();

        $userName = $user->name;
        $user->delete();

        return redirect()->route('admin.users')
            ->with('success', "Pengguna {$userName} telah dihapus");
    }
}
