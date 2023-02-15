<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;

class  CommonController extends Controller
{
    public function hospitalDoctors(Request $request, Hospital $hospital)
    {
        return view('admin.hospital.doctor.index', [
            'doctors' => User::query()->where('hospital_id', $hospital->id)->where('user_type', 'D')->orderByDesc('id')->get(),
        ]);
    }
}
