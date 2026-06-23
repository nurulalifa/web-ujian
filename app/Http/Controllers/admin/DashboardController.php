<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Memanggil file dashboard.blade.php yang ada di resources/views/admin/
        return view('admin.dashboard');
    }

    public function users()
    {
        $admins = user::all();
        $students = user::all()->where('role', 'student');
        // Jika ada view users, panggil di sini
        return view('admin.users.index', compact('admins','students'));
    }
}
