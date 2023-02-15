@extends('layout.mainlayout_hospital')
@section('title', 'Hospital Patients')
@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="page-header p-8 m-2">
            <div class="row align-items-center">
                <div class="col-md-12 d-flex justify-content-end">
                    <div class="doc-badge me-3">Patients <span class="ms-1">{{ count($patients) }}</span></div>
                    <a href="{{ route('patient.create') }}" class="btn btn-primary btn-add"><i class="feather-plus-square me-1"></i> Add New</a>
                </div>
            </div>
        </div>
        @if(session()->has('flash'))
            <x-alert>{{ session('flash')['message'] }}</x-alert>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="tab-content">

                        <!-- patient List -->
                        <div>
                            <div class="card card-table mb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center mb-0">
                                            <thead>
                                            <tr>
                                                <th>Patient</th>
                                                <th>Blood Group</th>
                                                <th>Total Income</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($patients as $patient)
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            @if($patient->profile_image ?? '')
                                                                <a  class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('storage/images/' . $patient->profile_image) }}" alt="User Image"></a>
                                                            @else
                                                                <a  class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ URL::asset('/assets/img/patients/patient.jpg')}}" alt="User Image"></a>
                                                            @endif
                                                            <a>{{ $patient->name }} <span></span></a>
                                                        </h2>
                                                    </td>
                                                    @if($patient->blood_group ?? '')
                                                    <td>{{ $patient->blood_group }}</td>
                                                        @else
                                                        <td>N/A</td>
                                                    @endif
                                                    <td class="text-center">${{ $patient->pricing }}</td>
                                                    <td class="text-end">
                                                        <div class="table-action">
                                                            <a href="{{ route('patient.edit', $patient) }}" class="btn btn-sm bg-success-light">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>
                                                            <a href="#" class="btn btn-sm bg-danger-light">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="col-span-6">
                                                    <td>No patients Available</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /patient List -->

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



