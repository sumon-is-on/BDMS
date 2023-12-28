@extends('Web.layouts.master')
@section('content')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="login-wrap p-4 p-md-5">
                    <h4 class="text-center mb-4">Registration for BDMS</h4>
                    <form action="{{ route('web.profile.update', $user->id) }}" method="POST" class="login-form" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name" class="block mb-2 font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" name="name" class="form-control rounded-left"  value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="Email" class="block mb-2 font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="text" name="email" class="form-control rounded-left" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="Contact Number" class="block mb-2 font-medium text-gray-900 dark:text-white">Contact Number</label>
                                    <input type="text" name="phone" class="form-control rounded-left" value="{{ $user->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="image" class="block mb-2 font-medium text-gray-900 dark:text-white">Image</label>
                                    <input type="file" class="form-control" name="image" id="image" aria-describedby="image-explanation">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender" class="block mb-2 font-medium text-gray-900 dark:text-white">Select Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male" @if($user->gender == 'male') selected @endif>Male</option>
                                        <option value="female" @if($user->gender == 'female') selected @endif>Female</option>
                                    </select>
                                    @error('gender')<span class="text-red-600">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="countries" class="block mb-2 font-medium text-gray-900 dark:text-white">Registration AS:</label>
                                    <select name="role_id" id="role_id" class="form-control">
                                        @foreach ($roles as $role)
                                            <option name="role_id" value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Address" class="block mb-2 font-medium text-gray-900 dark:text-white">Address</label>
                                    <input type="text" name="address" class="form-control rounded-left" value="{{ $user->address }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
