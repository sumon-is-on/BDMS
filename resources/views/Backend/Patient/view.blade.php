@extends('Backend.Layouts.master')
@section('content')
<div class="content-header m-8">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Patient Profile</h1>
            </div>
        </div>
    </div>
</div>

<div class="p-4 md:p-12 text-center lg:text-left">
    <div class="flex justify-center items-center mb-6"> <!-- Added margin-bottom -->
        <img src="{{ asset('/users/' . $patient->image) }}" alt="User Image" class="rounded-full" style="height: 300px; width: 300px;">
    </div>
    <div class="mt-6"> <!-- Added margin-top -->
        <p class="text-8xl font-bold pt-8 lg:pt-0"><b>{{ $patient->name }}</b></p>
    </div>
    <p class="mt-4"><span><b>Blood Group: </b>{{ $patient->blood_group }}</span></p> <!-- Added margin-top -->
    <p class="mt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start"> <b>Address:  </b> {{ $patient->address }}</p>
    <p class="mt-2"><span><b>Contact: </b>{{ $patient->phone }}</span></p> <!-- Added margin-top -->
    <p class="mt-2"><span class="ml-7"><b>Email: </b>{{ $patient->email }}</span></p> <!-- Added margin-top -->
    <div class="flex justify-end space-x-4 mt-4"> <!-- Added margin-top -->
        <a href="{{ route('patient.index') }}" class="btn btn-info mb-2">Back</a>
        <a href="{{ route('patient.history', $patient->id) }}" class="btn btn-success mb-2 ml-2">History</a>
        @if (auth()->user()->id == $patient->id)
            <a href="{{ route('user.edit', $patient->id) }}" class="btn btn-warning mb-2">Update</a>
        @endif
    </div>
</div>
@endsection
