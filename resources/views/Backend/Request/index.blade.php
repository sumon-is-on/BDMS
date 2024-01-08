@extends('Backend.Layouts.master')
@section('content')
<div class="content-header m-8">
    <div class=" container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Blood Request List</h1>
            </div>
        </div>
    </div>
</div>

<div class="flex">
    <div class="flex ">
        <form action="{{ route('backend.request.list') }}" method="GET" role="search">
            <div class="flex input-group">
                <span class="input-group-btn mr-5"></span>
                <input type="text" value="{{ $search }}" class=" border rounded w-96 py-1 px-2 text-gray-700" name="search" placeholder="Search a brand" id="search">
                <a href="{{ route('backend.request.list') }}" class="ml-2">
                    <button class="btn btn-info" type="button" title="Refresh page">Refresh</button>
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
                    <th scope="col" class="py-3 px-6">Patient Name</th>
                    <th scope="col" class="py-3 px-6">Hospital </th>
                    <th scope="col" class="py-3 px-6">Hospital Address</th>
                    <th scope="col" class="py-3 px-6">Asking Blood Group</th>
                    <th scope="col" class="py-3 px-6">Quantity</th>
                    <th scope="col" class="py-3 px-6">Required Date</th>
                    <th scope="col" class="py-3 px-6">Required Time</th>
                    <th scope="col" class="py-3 px-6">Donor Name</th>
                    <th scope="col" class="py-3 px-6">Status</th>
                    <th scope="col" class="py-3 px-6">Actions</th>
                    </tr>
                </thead>
                @foreach ($brs as $key=>$brs)
                <tbody>
                    <tr class="">
                    <td class="py-1 px-6">{{ $key+1 }}</td>
                    <td class="py-1 px-6 uppercase">{{ $brs->Patient->name }}</td>
                    <td class="py-1 px-6 uppercase">{{ $brs->hospital }}</td>
                    <td class="py-1 px-6 uppercase">{{ $brs->hospital_address }}</td>
                    <td class="py-1 px-6 uppercase">{{ $brs->asking_bg }}</td>
                    <td class="py-1 px-6 uppercase">{{ $brs->qty }} Bag</td>
                    <td class="py-1 px-6 uppercase">{{ $brs->required_date }}</td>
                    <td class="py-1 px-6 uppercase">{{ $brs->required_time }}</td>
                    <td class="py-1 px-6 uppercase">{{ $brs->Donor->name ?? " "}}</td>
                    <td class="py-1 px-6 uppercase">{{ $brs->status }}</td>
                    <td class="py-1 px-6">
                        <div class="flex">
                        <a href="{{ route('backend.request.show', $brs->id) }}"class="text-indigo-600 hover:text-indigo-900">
                            <svg class="h-5 w-5 fill-current text-indigo-700" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                            <path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
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
