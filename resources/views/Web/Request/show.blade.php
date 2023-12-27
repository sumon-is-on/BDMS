@extends('Web.layouts.master')
@section('content')
<section class="ftco-section">
<div class="col-md-7 text-center heading-section ftco-animate">
    <h2 class="mb-3">Blood Requests Details</h2>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
            <div class="text w-100">
                <h3 class="heading mb-2">Blood Group: {{ $br->asking_bg }}</h3>
                <p>Hospital :{{ $br->hospital }}</p>
                <p>Hospital Address: {{ $br->hospital_address }}</p>
                <p>Patient Name:{{ $br->Patient->name }}</p>
                <p>Patient Contact: {{ $br->Patient->phone }}</p>
            </div>
        <div>
            <a href="" class=" btn btn-success">Donate</a>
        </div>
    </div>
</div>
</section>
@endsection
