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
    <div class="container-fluid" id="donor-history">
        <div style="margin:20px;">
            <h2>{{ $histories[0]->Donor->name }}</h2>
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
        <button onclick="printDonorHistory()" type="button" class="btn btn-info">Download</button>
    </div>
</section>

<script>
    function printDonorHistory() {
        var headerContents = document.querySelector('.content-header').innerHTML;
        var historyContents = document.getElementById('donor-history').innerHTML;
        var printContents = headerContents + historyContents;

        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@endsection
