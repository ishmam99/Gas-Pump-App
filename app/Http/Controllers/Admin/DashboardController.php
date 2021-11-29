<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function user()
    {
        return view('users.dashboard');
    }
      public function home()
    {
        return view('home');
    }
    public function logout(){
        Auth::logout();
        return Redirect()->route('welcome');
    }
}
