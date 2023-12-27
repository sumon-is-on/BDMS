@extends('Backend.Layouts.master')
@section('content')
<div class="content-header m-8">
    <div class=" container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Index</h1>
            </div>
        </div>
    </div>
</div>

<div class="flex">
    <div class="flex ">
        <form action="{{ route('user.index') }}" method="GET" role="search">
            <div class="flex input-group">
                <span class="input-group-btn mr-5"></span>
                <input type="text" value="{{ $search }}" class=" border rounded w-96 py-1 px-2 text-gray-700" name="search" placeholder="Search an user" id="search">
                <a href="{{ route('user.index') }}" class="ml-2">
                    <button class="btn btn-info" type="button" title="Refresh page">Refresh</button>
                </a>
                <a href="{{ route('user.create') }}" class="ml-2">
                    <button class="btn btn-info" type="button">Add User</button>
                </a>
            </div>
        </form>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div style="margin:20px;">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                    <tr>
                    <th scope="col" class="py-3 px-6">Sl</th>
                    <th scope="col" class="py-3 px-6">Name</th>
                    <th scope="col" class="py-3 px-6">Image</th>
                    <th scope="col" class="py-3 px-6">Email</th>
                    <th scope="col" class="py-3 px-6">Contact</th>
                    <th scope="col" class="py-3 px-6">Blood Group</th>
                    <th scope="col" class="py-3 px-6">Gender</th>
                    <th scope="col" class="py-3 px-6">Address</th>
                    <th scope="col" class="py-3 px-6">Action</th>
                    </tr>
                </thead>
                @foreach ($users as $key=>$user)
                <tbody>
                    <tr class="">
                    <td class="py-1 px-6">{{ $key+1 }}</td>
                    <td class="py-1 px-6 uppercase">{{ $user->name }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-1 whitespace-nowrap">
                        <img class="max-w-full h-auto rounded-full" src="{{ url('/users/'.$user->image)}}" width="35px">
                    </td>
                    <td class="py-1 px-6">{{ $user->email }}</td>
                    <td class="py-1 px-6 uppercase">{{ $user->phone }}</td>
                    <td class="py-1 px-6 uppercase">{{ $user->blood_group }}</td>
                    <td class="py-1 px-6 uppercase">{{ $user->gender }}</td>
                    <td class="py-1 px-6 uppercase">{{ $user->address }}</td>
                    <td class="py-1 px-6">
                        <div class="flex">
                        <a href="{{ route('user.show',$user->id) }}"class="text-indigo-600 hover:text-indigo-900">
                            <svg class="h-5 w-5 fill-current text-indigo-700" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                            <path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                            </svg>
                        </a>
                        <a href="{{ route('user.edit',$user->id) }}"class="text-indigo-600 hover:text-indigo-900">
                            <svg class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                            <path fill-rule="evenodd"d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="{{ route('user.delete',$user->id) }}"class="text-indigo-600 hover:text-indigo-900" onclick="return confirm('Are you sure you want to delete it ?')">
                            <svg class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        </div>
                    </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection
