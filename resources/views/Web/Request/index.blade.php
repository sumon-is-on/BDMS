@extends('Web.layouts.master')
@section('content')
<section class="ftco-section">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">Blood Requests</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($brs as $br)
                    <div class="col-md-3">
                        <div class="services services-2 w-100 text-center">
                            <div class="text w-100">
                                <h3 class="heading mb-2">{{ $br->asking_bg }}</h3>
                                <p>{{ $br->hospital }}</p>
                                <p>{{ $br->hospital_address }}</p>
                                <p>{{ $br->Patient->name }}</p>
                                <p>{{ $br->Patient->phone }}</p>
                            </div>
                            <div>
                                <a href="{{ route('web.request.show', $br->id) }}" class=" btn btn-info">View</a>
                                <a href="" class=" btn btn-success">Donate</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</section>
@endsection
