@extends('Web.layouts.master')
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="login-wrap p-4 p-md-5">
                    <h4 class="text-center mb-4">Please Fill up this form to ask for Blood</h4>
                    <form action="{{ route('request.post') }}" method="POST" class="login-form" enctype="multipart/form-data">
                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hospital" class="block mb-2 font-medium text-gray-900 dark:text-white">Hospital Name</label>
                                    <input type="text" name="hospital" class="form-control rounded-left" placeholder="Enter the hospital name">
                                </div>
                                <div class="form-group">
                                    <label for="hospital_address" class="block mb-2 font-medium text-gray-900 dark:text-white">Hospital Address</label>
                                    <input type="text" name="hospital_address" class="form-control rounded-left" placeholder="Enter the hospital address">
                                </div>
                                <div class="form-group">
                                    <label for="operation" class="block mb-2 font-medium text-gray-900 dark:text-white">Operation Name</label>
                                    <input type="text" name="operation" class="form-control rounded-left" placeholder="The operation name">
                                </div>
                                <div class="form-group">
                                    <label for="asking_bg" class="block mb-2 font-medium text-gray-900 dark:text-white">Asking Blood Group</label>
                                    <input type="text" name="asking_bg" class="form-control rounded-left">
                                </div>
                                <div class="form-group">
                                    <label for="required_date" class="block mb-2 font-medium text-gray-900 dark:text-white">Required Date</label>
                                    <input type="date" name="required_date" class="form-control rounded-left">
                                </div>
                                <div class="form-group">
                                    <label for="required_date" class="block mb-2 font-medium text-gray-900 dark:text-white">Required Date</label>
                                    <input type="time" name="required_date" class="form-control rounded-left">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <input type="hidden" name="patient_id" value="{{ auth()->user()->id }}">
                                <div class="form-group">
                                    <label for="Name" class="block mb-2 font-medium text-gray-900 dark:text-white">Patient Name</label>
                                    <input type="text" name="name" class="form-control rounded-left" placeholder="Your Name" value="{{ auth()->user()->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="Email" class="block mb-2 font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="text" name="email" class="form-control rounded-left" placeholder="Email" value="{{ auth()->user()->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="Contact Number" class="block mb-2 font-medium text-gray-900 dark:text-white">Contact Number</label>
                                    <input type="text" name="phone" class="form-control rounded-left" placeholder="Contact Number"  value="{{ auth()->user()->phone }}"  required>
                                </div>
                                <div class="form-group">
                                    <label for="Address" class="block mb-2 font-medium text-gray-900 dark:text-white">Address</label>
                                    <input type="text" name="address" class="form-control rounded-left" value="{{ auth()->user()->address }}" placeholder="Address">
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Submit</button>
                            </div>
                            <div class="form-group ml-5">
                                <a href="{{ route('web.home') }}">
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
