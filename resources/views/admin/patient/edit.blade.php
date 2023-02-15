@extends('layout.mainlayout_admin')
@section('title', 'Edit Patient')
@section('content')
    <div class="page-wrapper">

            <!-- Specialities -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Edit Patient</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('patient.update', $patient) }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <!-- Name -->
                                <div class="form-group row">
                                    <label for="name" class="col-form-label col-md-2">Patient Name</label>
                                    <div class="col-md-10">
                                        <input
                                            id="name"
                                            name="name"
                                            type="text"
                                            value="{{ $patient->name }}"
                                            class="form-control"
                                            placeholder="Enter patient name"
                                        >
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="form-group row">
                                    <label for="email" class="col-form-label col-md-2">Patient Email</label>
                                    <div class="col-md-10">
                                        <input
                                            id="email"
                                            name="email"
                                            type="text"
                                            value="{{ $patient->email }}"
                                            class="form-control"
                                            placeholder="Enter patient email"
                                        >
                                    </div>
                                </div>
                                <!-- type -->
                                <input type="hidden" name="user_type" id="user_type" value="U">
                                <!-- hospital -->
                                <div class="form-group row">
                                    <label for="hospital_id" class="col-form-label col-md-2">Hospital</label>
                                    <div class="col-md-10">
                                        <select id="hospital_id" name="hospital_id" class="form-select select">
                                            <option>-- Select Hospital --</option>
                                            @foreach($hospitals as $hospital)
                                                <option value="{{ $hospital->id }}"
                                                    {{ old('hospital_id', $patient->hospital_id) == $hospital->id ? 'selected' : '' }}
                                                >
                                                    {{ $hospital->hospital_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- hospital -->
                                <div class="form-group row">
                                    <label for="gender" class="col-form-label col-md-2">Gender</label>
                                    <div class="col-md-10">
                                        <select id="gender" name="gender" class="form-select select">
                                            <option>-- Select Gender --</option>
                                            <option value="M" {{ $patient->gender == "M" ? 'selected' : '' }}>Male</option>
                                            <option value="F" {{ $patient->gender == "F" ? 'selected' : '' }}>Female</option>
                                            <option value="O" {{ $patient->gender == "O" ? 'selected' : '' }}>Others</option>

                                        </select>
                                    </div>
                                </div>
                                <!-- Pricing -->
                                <div class="form-group row">
                                    <label for="pricing" class="col-form-label col-md-2">Total Income</label>
                                    <div class="col-md-10">
                                        <input id="pricing"
                                               name="pricing"
                                               type="text"
                                               value="{{ $patient->pricing }}"
                                               class="form-control"
                                               placeholder="Enter patient total income"
                                        >
                                    </div>
                                </div>
                                <!-- Profile Image -->
                                <div class="form-group row">
                                    <label for="profile_image" class="col-form-label col-md-2">Patient Image</label>
                                    <div class="col-md-10">
                                        <input id="profile_image" name="profile_image" class="form-control" type="file">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-add" ><i class="feather-plus-square me-1"></i> Update Patient Details</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Specialities -->
        </div>
    </div>
    <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->

@endsection
