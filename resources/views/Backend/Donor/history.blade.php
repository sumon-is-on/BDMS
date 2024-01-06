@extends('Backend.Layouts.master')
@section('content')
<div class="content-header m-8">
    <div class=" container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Donor History</h1>
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
                        <th scope="col" class="py-3 px-6">Hospital</th>
                        <th scope="col" class="py-3 px-6">Patient</th>
                        <th scope="col" class="py-3 px-6">Reason</th>
                        <th scope="col" class="py-3 px-6">Date</th>
                    </tr>
                </thead>
                @foreach ($histories as $key=>$data)
                <tbody>
                    <tr class="">
                        <td class="py-1 px-6">{{ $key+1 }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->BloodRequest->hospital }}</td>
                        <td class="py-1 px-6">{{ $data->BloodRequest->Patient->name }}</td>
                        <td class="py-1 px-6">{{ $data->BloodRequest->operation }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->BloodRequest->required_date}}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection
