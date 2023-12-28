@extends('Web.layouts.master')
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="login-wrap p-4 p-md-5">
                    <h4 class="text-center mb-4">Please Fill up this form to ask your queries</h4>
                    <form action="{{ route('contact.store') }}" method="POST" class="login-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="block mb-2 font-medium text-gray-900 dark:text-white"> Name</label>
                                    <input type="text" name="name" class="form-control rounded-left" placeholder="Enter your name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="block mb-2 font-medium text-gray-900 dark:text-white">email</label>
                                    <input type="email" name="email" class="form-control rounded-left" placeholder="Enter email address" required>
                                </div>
                                <div class="form-group">
                                    <label for="message" class="block mb-2 font-medium text-gray-900 dark:text-white">Message</label>
                                    <input type="text" name="message" class="form-control rounded-left" placeholder="Your queries">
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
