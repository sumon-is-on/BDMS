@extends('Backend.Layouts.master')
@section('content')
<div class="content-header m-8">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Donor Profile</h1>
            </div>
        </div>
    </div>
</div>
<div class="p-4 md:p-12 text-center lg:text-left">
    <img src="{{ asset('/users/' . $donor->image) }}" alt="User Image" class="rounded-full h-32 w-32 mx-auto lg:mx-0 lg:mr-6">
    <h1 class="text-3xl font-bold pt-8 lg:pt-0">{{ $donor->name }}</h1>
    <p><span><b>Blood group: </b>{{ $donor->blood_group }}</span></p>
    <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">Address: {{ $donor->address }}</p>
    <p><span><b>Contact: </b>{{ $donor->phone }}</span></p>
    <p><span class="ml-7"><b>Email: </b>{{ $donor->email }}</span></p>
    <div class="flex justify-end space-x-4 m-7">
        <a href="{{ route('user.index') }}" class="btn btn-info mb-2">Back</a>
        @if (auth()->user()->id == $donor->id)
            <a href="{{ route('user.edit', $donor->id) }}" class="btn btn-warning mb-2">Update</a>
        @endif
    </div>
</div>
@endsection
