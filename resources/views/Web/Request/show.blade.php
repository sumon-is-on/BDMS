@extends('Web.layouts.master')
@section('content')
<section class="ftco-section">
<div class="col-md-12 text-center heading-section ftco-animate mb-20">
    <h2 class="mb-3">Blood Requests Details</h2>
</div>
<div class="row mt-11">
    <div class="col-md-12">
        <div class="services services-2 w-100 text-center">
            <div class=" flex mt-24">
                <div class="flex justify-center items-center mb-6 col-md-3">
                    <img src="{{ asset('/users/' . $br->Patient->image) }}" alt="User Image" class="rounded-full" style="height: 200px; width: 200px;">
                </div>
                <div class="text w-100 col-md-3">
                    <h3 class="heading mb-2"> Patient Information</h3>
                    <p>Patient Name : {{ $br->Patient->name }}</p>
                    <p>Address: {{ $br->Patient->address }}</p>
                    <p>Contact:{{ $br->Patient->phone }}</p>
                    <p>Email: {{ $br->Patient->email }}</p>
                </div>
                <div class="text w-100 col-md-3">
                    <h3 class="heading mb-2"> Required Info on Donation  </h3>
                    <p>Required Blood Group : <b>{{ $br->asking_bg }}</b></p>
                    <p>Hospital :{{ $br->hospital }}</p>
                    <p>Hospital Address: {{ $br->hospital_address }}</p>
                    <p>Hospital Address: {{ $br->operation }}</p>
                    <p>Date: {{ $br->required_date }}</p>
                    <p>Time: {{ $br->required_time}}</p>
                </div>
                <div class="col-md-3"></div>
            </div>
        <div>
            <a href="" class=" btn btn-info">Back</a>
            <a href="" class=" btn btn-success">Donate</a>
        </div>
    </div>
</div>
</section>
@endsection
