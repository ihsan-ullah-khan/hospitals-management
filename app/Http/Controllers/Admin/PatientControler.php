<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PatientControler extends Controller
{
    protected  $image_path = 'public/images/';
    public function index()
    {
        if (Auth::user()->is_admin())
        {
            return view('admin.patient.index',[
                'patients' => User::query()->where('user_type', 'U')->orderByDesc('id')->get(),
            ]);
        }elseif(Auth::user()->is_hospital())
        {
            return view('hospital.patient.index',[
                'patients' => User::query()->where('hospital_id', Auth::user()->hospital_id)->where('user_type', 'U')->orderByDesc('id')->get(),
            ]);
        }
    }
    public function create()
    {
        if (Auth::user()->is_admin())
        {
            return view('admin.patient.create',[
                'hospitals' => Hospital::query()->orderByDesc('id')->get(),
            ]);
        }elseif(Auth::user()->is_hospital())
        {
            return view('hospital.patient.create');
        }

    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
           'name' => 'required',
           'email' => 'required',
           'hospital_id' => 'required',
           'gender' => 'required',
           'user_type' => 'required',
           'pricing' => 'required',
           'profile_image' => 'image'
        ]);
        if ($attributes['profile_image'] ?? false)
        {
            if ($file = $request->file('profile_image'))
            {
                $filename = $request->id . '' . $file->getClientOriginalName();
                Storage::disk('local')->put($this->image_path . $filename, $file->getContent());
            }
            $attributes['profile_image'] = $filename;
        }

        User::create($attributes);

        return redirect()
            ->route('patient.index')
            ->with('flash', ['type', 'success', 'message' => 'Patient Added Successfully.']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if (Auth::user()->is_admin())
        {
            return view('admin.patient.edit', [
                'patient' => User::find($id),
                'hospitals' => Hospital::query()->orderByDesc('id')->get(),
            ]);
        }
        elseif(Auth::user()->is_hospital())
        {
            return view('hospital.patient.edit', [
                'patient' => User::find($id),
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        if ($patient = User::find($id))
        {
            $attributes = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'hospital_id' => 'required',
                'gender' => 'required',
                'user_type' => 'required',
                'pricing' => 'required',
                'profile_image' => 'image'
            ]);
            if ($attributes['profile_image'] ?? false)
            {
                if ($file = $request->file('profile_image'))
                {
                    $filename = $request->id . '' . $file->getClientOriginalName();
                    Storage::disk('local')->put($this->image_path . $filename, $file->getContent());
                }
                $attributes['profile_image'] = $filename;
            }

            $patient->update($attributes);

            return redirect()
                ->route('patient.index')
                ->with('flash', ['type', 'success', 'message' => 'Patient Updated Successfully.']);
        }
    }

    public function destroy($id)
    {
        $patient = User::find($id);
        $patient->delete();

        return redirect()
            ->route('patient.index')
            ->with('flash', ['type', 'success', 'message' => 'Patient Deleted Successfuly']);
    }
}
