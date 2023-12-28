@extends('Web.layouts.master')
@section('content')
<div style=" margin-top:100px;">
    <div class="p-4 md:p-12 text-center lg:text-left">
        <div class="flex justify-center items-center mb-6"> <!-- Added margin-bottom -->
            <img src="{{ asset('/users/' . $user->image) }}" alt="User Image" class="rounded-full" style="height: 300px; width: 300px;">
        </div>
        <div class="mt-6"> <!-- Added margin-top -->
            <p class="text-8xl font-bold pt-8 lg:pt-0"><b>{{ $user->name }}</b></p>
        </div>
        <p class="mt-4"><span><b>Blood Group: </b>{{ $user->blood_group }}</span></p> <!-- Added margin-top -->
        <p class="mt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start"> <b>Address:  </b> {{ $user->address }}</p>
        <p class="mt-2"><span><b>Contact: </b>{{ $user->phone }}</span></p> <!-- Added margin-top -->
        <p class="mt-2"><span class="ml-7"><b>Email: </b>{{ $user->email }}</span></p> <!-- Added margin-top -->
        <div class="flex justify-end space-x-4 mt-4"> <!-- Added margin-top -->
            <a href="{{ route('web.home') }}" class="btn btn-info mb-2">Back</a>
            @if (auth()->user()->id == $user->id)
                <a href="{{ route('web.profile.edit', $user->id) }}" class="btn btn-warning mb-2">Update</a>
            @endif
        </div>
    </div>
</div>
@endsection
