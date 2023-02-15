<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    protected  $image_path = 'public/images/';
    public function index()
    {
        if (Auth::user()->is_admin())
        {
            return view('admin.profile.index',[
                'admin' => User::find(Auth::id())
            ]);
        }elseif(Auth::user()->is_hospital())
        {
            return view('hospital.profile.index',[
                'hospital' => Hospital::query()->where('id', Auth::user()->hospital_id)->get(),
                'hospital_admin' => User::find(Auth::id()),
            ]);

        }
        elseif (Auth::user()->is_doctor())
        {
            return view('doctor.profile.index', [
               'doctor' =>User::find(Auth::id()),
                'edu_details' => Education::query()->where('user_id', Auth::id())->orderByDesc('id')->get(),
                'experiences' => Experience::query()->where('user_id', Auth::id())->orderByDesc('id')->get(),
            ]);
        }
        elseif (Auth::user()->is_patient())
        {
            return view('patient.profile.index', [
               'patient' => User::find(Auth::id()),
            ]);
        }

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $id = Auth::user()->id;
        if (Auth::user()->is_admin())
        {
            return view('admin.profile.edit', [
               'admin' => User::find($id),
            ]);
        }
        elseif (Auth::user()->is_hospital())
        {
            return view('hospital.profile.edit',[
               'hospital_admin' => User::find($id),
            ]);
        }
        elseif (Auth::user()->is_doctor())
        {
            return view('doctor.profile.edit',[
               'doctor' => User::find($id),
            ]);
        }
        elseif (Auth::user()->is_patient())
        {
            return view('patient.profile.edit', [
               'patient' => User::find($id)
            ]);
        }
    }

    public function update(Request $request, $id)
    {

                $attributes = $request->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'username' => 'nullable',
                    'profile_image' => 'image',
                    'mobile' => 'required',
                    'description' => 'required',
                    'date_of_birth' => 'required',
                    'gender' => 'required',
                    'age' => 'required',
                    'address' => 'required',
                    'country' => 'required',
                    'state' => 'required',
                    'zip_code' => 'required',
                    'blood_group' => 'nullable',
                    'pricing' => 'required',
                    'twitter' => 'nullable',
                    'facebook' => 'nullable',
                    'linkedin' => 'nullable',
                    'pinterest' => 'nullable',
                    'instagram' => 'nullable',
                    'youtube'=> 'nullable',
                ]);
                if ($attributes['profile_image'] ?? false)
                {
                    if ($file = $request->file('profile_image'))
                    {
                        $filename = Auth::id() . '-'. $file->getClientOriginalName();
                        Storage::disk('local')->put($this->image_path . $filename , $file->getContent());
                    }
                     $attributes['profile_image'] = $filename;
                }
                Auth::user()->update($attributes);

            return redirect()->route('profile.index')->with('flash', ['type', 'success', 'message' => 'Profile Updated Successfully']);
    }

    public function destroy($id)
    {
        //
    }
}
