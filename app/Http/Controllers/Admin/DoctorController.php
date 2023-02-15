<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    protected  $image_path = 'public/images/';
    public function index()
    {
        if (Auth::user()->is_admin())
        {
            return view('admin.doctor.index',
                [
                    'doctors' => User::query()->where('user_type', 'D')->orderByDesc('id')->get(),
                ]);
        }else
        {
            return view('hospital.doctor.index', [
                'doctors' => User::query()->where('hospital_id', Auth::user()->hospital_id)->where('user_type', 'D')->orderByDesc('id')->get(),
            ]);
        }


    }

    public function create()
    {
        if (Auth::user()->is_admin())
            {
                return view('admin.doctor.create',
                    [
                        'specialities' => Speciality::query()->orderByDesc('id')->get(),
                        'hospitals' => Hospital::query()->orderByDesc('id')->get(),
                    ]);
            }elseif(Auth::user()->is_hospital())
            {
                return view('hospital.doctor.create', [
                    'specialities' => Speciality::query()->orderByDesc('id')->get(),
                    'hospitals' => Hospital::query()->orderByDesc('id')->get(),
                ]);
            }
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'profile_image' => 'image',
            'user_type' => 'required',
            'hospital_id' => 'required',
            'speciality_id' => 'required',
            'pricing' => 'required',
        ]);
        if ($attributes['profile_image'] ?? false) {
            if ($file = $request->file('profile_image')) {
                $filename = $request->id . '' . $file->getClientOriginalName();
                Storage::disk('local')->put($this->image_path . $filename, $file->getContent());
            }
            $attributes['profile_image'] = $filename;
        }

        User::create($attributes);


        return redirect()
            ->route('doctor.index')
            ->with('flash', ['type', 'success', 'message' => 'Doctor created Successfully']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if (Auth::user()->is_admin())
        {
            return view('admin.doctor.edit',
                [
                    'doctor' => User::find($id),
                    'specialities' => Speciality::query()->orderByDesc('id')->get(),
                    'hospitals' => Hospital::query()->orderByDesc('id')->get(),
                ]);
        }elseif(Auth::user()->is_hospital())
        {
            return view('hospital.doctor.edit',
                [
                    'doctor' => User::find($id),
                    'specialities' => Speciality::query()->orderByDesc('id')->get(),
                    'hospitals' => Hospital::query()->orderByDesc('id')->get(),
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        if ($doctor = User::find($id))
        {
            $attributes = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'profile_image' => 'image',
                'user_type' => 'required',
                'hospital_id' => 'required',
                'speciality_id' => 'required',
                'pricing' => 'required',
            ]);
            if ($attributes['profile_image'] ?? false)
            {
                if ($file = $request->file('profile_image'))
                {
                    $filename = $request->id . '' . $file->getClientOriginalName();
                    Storage::disk('local')->put($this->image_path. $filename, $file->getContent());
                }
                $attributes['profile_image'] = $filename;
            }
            $doctor->update($attributes);
        }
        return redirect()
            ->route('doctor.index')
            ->with('flash', ['type', 'success', 'message' => 'Doctor Details updated Successfuylly']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = User::find($id);
        $doctor->delete();

        return redirect()
            ->route('doctor.index')
            ->with('flash', ['type', 'success', 'message' => 'Doctor Deleted Successfully']);
    }
}
