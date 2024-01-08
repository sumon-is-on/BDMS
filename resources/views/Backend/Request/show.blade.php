@extends('Backend.Layouts.master')
@section('content')
<div class="content-header m-8">
    <div class=" container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Blood Request View</h1>
            </div>
        </div>
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
                    </tr>
                </thead>
                @foreach ($values as $key=>$data)
                <tbody>
                    <tr class="">
                        <td class="py-1 px-6">{{ $key+1 }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->Patient->name }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->hospital }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->hospital_address }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->asking_bg }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->qty }} Bag</td>
                        <td class="py-1 px-6 uppercase">{{ $data->required_date }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->required_time }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->Donor->name ?? " "}}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->status }}</td>
                    </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection
