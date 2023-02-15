@extends('layout.mainlayout_hospital')
@section('title', 'Edit Doctors')
@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Doctor</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('doctor.update', $doctor) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <!-- Name -->
                            <div class="form-group row">
                                <label for="name" class="col-form-label col-md-2">Doctor Name</label>
                                <div class="col-md-10">
                                    <input id="name" name="name" type="text" value="{{ $doctor->name }}" class="form-control" placeholder="Enter doctor name">
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="form-group row">
                                <label for="email" class="col-form-label col-md-2">Doctor Email</label>
                                <div class="col-md-10">
                                    <input id="email" name="email" type="text" value="{{ $doctor->email }}" class="form-control" placeholder="Enter doctor email">
                                </div>
                            </div>
                            <!-- type -->
                            <input type="hidden" name="user_type" id="user_type" value="D">
                            <!-- Speciality -->
                            <div class="form-group row">
                                <label for="speciality_id" class="col-form-label col-md-2">Speciality</label>
                                <div class="col-md-10">
                                    <select id="speciality_id" name="speciality_id" class="form-select select">
                                        <option>-- Select speciality --</option>
                                        @foreach($specialities as $speciality)
                                            <option value="{{ $speciality->id }}"
                                            {{ old('speciality_id', $doctor->speciality_id ) == $speciality->id ? 'selected' : '' }}
                                            >
                                                {{ $speciality->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- hospital -->
                            <input type="hidden" name="hospital_id" value="{{ \Illuminate\Support\Facades\Auth::user()->hospital_id }}">
                            <!-- Pricing -->
                            <div class="form-group row">
                                <label for="pricing" class="col-form-label col-md-2">Pricing</label>
                                <div class="col-md-10">
                                    <select id="pricing" name="pricing" class="form-select select">
                                        <option>-- Select Fee --</option>
                                        <option value="Free" {{ $doctor->pricing == 'Free' ? 'selected' : '' }}>Free</option>
                                        <option value="10" {{ $doctor->pricing == '10' ? 'selected' : '' }}>$10</option>
                                        <option value="20" {{ $doctor->pricing == '20' ? 'selected' : '' }}>$20</option>
                                        <option value="30" {{ $doctor->pricing == '30' ? 'selected' : '' }}>$30</option>

                                    </select>
                                </div>
                            </div>
                            <!-- Profile Image -->
                            <div class="form-group row">
                                <label for="profile_image" class="col-form-label col-md-2">Doctor Image</label>
                                <div class="col-md-10">
                                    <input id="profile_image" name="profile_image" class="form-control" type="file">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-add" ><i class="feather-plus-square me-1"></i> Update Doctor Details</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    </div>

    </div>
    <!-- /Page Content -->
    </div>
@endsection
