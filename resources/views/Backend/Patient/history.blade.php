@extends('Backend.Layouts.master')
@section('content')
<div class="content-header m-8">
    <div class=" container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Patient History</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid" id="donor-history">
        <div style="margin:20px;">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">Sl</th>
                        <th scope="col" class="py-3 px-6">Hospital</th>
                        <th scope="col" class="py-3 px-6">Donor</th>
                        <th scope="col" class="py-3 px-6">Reason</th>
                        <th scope="col" class="py-3 px-6">Date</th>
                        <th scope="col" class="py-3 px-6">Status</th>
                    </tr>
                </thead>
                @foreach ($histories as $key=>$data)
                <tbody>
                    <tr class="">
                        <td class="py-1 px-6">{{ $key+1 }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->hospital }}</td>
                        <td class="py-1 px-6">{{ $data->Donor->name ?? "" }}</td>
                        <td class="py-1 px-6">{{ $data->operation }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->required_date}}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->status}}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <button onclick="printDonorHistory()" type="button" class="btn btn-info">Download</button>
        </div>
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
