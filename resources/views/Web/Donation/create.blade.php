@extends('Web.layouts.master')
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="login-wrap p-4 p-md-5">
                    <h4 class="text-center mb-4">Please Fill up this form to donate Blood</h4>
                    <form action="{{ route('donation.store') }}" method="POST" class="login-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="donor_id" class="form-control rounded-left" value="{{ auth()->user()->id }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="hospital_address" class="form-control rounded-left" value="{{ request()->br_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="last_do_date" class="block mb-2 font-medium text-gray-900 dark:text-white">Last Donation Date</label>
                                    <input type="text" name="last_do_date" class="form-control rounded-left" >
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="form-group">
                                <button type="submit" onclick="return confirm('Are you sure you want to Donate it ?')" class="form-control btn btn-primary rounded submit px-3">Submit</button>
                            </div>
                            <div class="form-group ml-5">
                                <a href="{{ route('donation.create', request()->id) }}">
                                    <button type="button" class="form-control btn btn-info rounded submit px-3">Back</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
