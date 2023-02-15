<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->is_admin()){
            return view('admin.home', [
                'admin' => User::find(Auth::id())
            ]);
        }elseif (Auth::user()->is_hospital()){
            return view('hospital.home',[
                'hospital' => User::find(Auth::id()),
            ]);
        }elseif (Auth::user()->is_doctor()){
            return view('doctor.home');
        }elseif (Auth::user()->is_pharmacy()){
            return view('pharmacy-admin.home');
        }else{
            return view('patient.home');
        }
    }
    public function optimize()
    {
        Artisan::call('optimize:clear');
        echo 'Optimize command executed successfully.';
    }
}
