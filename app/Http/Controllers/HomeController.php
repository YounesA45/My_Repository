<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index ()
    {
      
       // dd(Auth()->user()->roles->pluck('name')[0] ?? '');
        if (Auth()->user()->roles->pluck('name')[0]  === 'Super Admin')
        return view('Admin.home');
        if (Auth()->user()->roles->pluck('name')[0]  === 'validate and sign')
        return view('Admin.home');
        if (Auth()->user()->roles->pluck('name')[0]  === 'Validate')
        return view('User.home');
        if (Auth()->user()->roles->pluck('name')[0]  === 'Sign')
        return view('User.home');
     else return view('home');
    }
}
