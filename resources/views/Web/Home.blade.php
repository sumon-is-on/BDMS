@extends('Web.layouts.master')
@section('content')

<div class="hero-wrap ftco-degree-bg" style="background-image: url('/web/header.jpeg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4">Donate Blood, Save Life !</h1>
                        <p style="font-size: 18px;">“Donating blood is the most personal way to give back to your community and save lives.”</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12 featured-top">
                    <div class="col-md-12 align-items-center">
                        <div class="flex justify-content-center align-items-center">

                            <a href="">
                                <button type="button" class="btn btn-success form-control w-30">Donate Blood</button>
                            </a>
                            <div style="margin: 0 50px;"></div>
                            <a href="">
                                <button type="button" class="btn btn-info form-control w-30">Ask For Blood</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Donors</span>
                    <h2 class="mb-2">People with a good Heart</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-car owl-carousel">
                        @foreach ($donors as $donor)
                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end" style="background-image: url('{{ url('/users/'.$donor->image) }}');"></div>
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="#">{{ $donor->name }}</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">{{ $donor->email }}</span>
                                        <p class="price ml-auto">$500 <span>/day</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block">
                                        <a href="#" class="btn btn-primary py-2 mr-1">Book now</a>
                                        <a href="#" class="btn btn-secondary py-2 ml-1">Details</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Services</span>
                    <h2 class="mb-3">Our Latest Services</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-wedding-car"></span>
                        </div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Wedding Ceremony</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 heading-section heading-section-white ftco-animate">
                    <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
                    <a href="{{ route('user.registration') }}" class="btn btn-primary btn-lg">Become A Driver</a>
                </div>
            </div>
        </div>
    </section> --}}


    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Patiens who got Blood in need</span>
                    <h2 class="mb-3">Happy Clients</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            @foreach ($patients as $patient)
                                <div class="testimony-wrap rounded text-center py-4 pb-5">
                                    <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="text pt-4">
                                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                        <p class="name">{{ $patient->name }}</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
