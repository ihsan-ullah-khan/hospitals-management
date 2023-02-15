<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HospitalController extends Controller
{
    protected  $image_path = 'public/images/';

    public function index()
    {
        return view('admin.hospital.index', [
            'hospitals' => Hospital::query()->orderByDesc('id')->get(),
        ]);
    }
    public function create()
    {
        return view('admin.hospital.create');
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'hospital_name' => 'required',
            'image' => 'required|image',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required',

        ]);
        if ($file = $request->file('image'))
        {
            $filename = $request->id . '' . $file->getClientOriginalName();
            Storage::disk('local')->put($this->image_path . $filename, $file->getContent());
        }
        $attributes['image'] = $filename;

        $hospital = Hospital::create($attributes);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => User::HOSPITAL,
            'hospital_id' => $hospital->id,
        ]);

        return redirect()
            ->route('hospital.index')
            ->with('flash', ['type', 'success', 'message' => 'Hospital and Admin created Successfully']);
    }


    public function show($id)
    {
        $hospital = Hospital::find($id);
        return view('admin.hospital.doctor.index',
        [
           'doctors' => User::query()->where('user_type', 'D')->where('hospital_id', $hospital->id)->orderByDesc('id')->get(),
        ]);
    }


    public function edit($id)
    {
        return view('admin.hospital.edit', [
            'hospital' => Hospital::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($hospital = Hospital::find($id))
        {
            $attributes = $request->validate([
               'hospital_name' => 'required',
               'address' => 'required',
               'country' => 'required',
               'state' => 'required',
               'city' => 'required',
               'zip' => 'required',
               'image' => 'image'
            ]);
                if ($attributes['image'] ?? false)
                {
                    if ($file = $request->file('image'))
                    {
                        $filename = $request->id . '' . $file->getClientOriginalName();
                        Storage::disk('local')->put($this->image_path . $filename . $file->getContent());
                    }
                    $attributes['image'] = $filename;
                }

                $hospital->update($attributes);

                return redirect()
                    ->route('hospital.index')
                    ->with('flash', ['type', 'success', 'message' => 'Hospital Details updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Hospital::find($id);
        $hospital->delete();

        return redirect()
            ->route('hospital.index');
    }
}
