@extends('Backend.Layouts.master')
@section('content')
<div class="content-header m-8">
    <div class=" container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Contact Us Index</h1>
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
                    <th scope="col" class="py-3 px-6">Name</th>
                    <th scope="col" class="py-3 px-6">email</th>
                    <th scope="col" class="py-3 px-6">Message</th>
                    </tr>
                </thead>
                @foreach ($contacts as $key=>$data)
                <tbody>
                    <tr class="">
                        <td class="py-1 px-6">{{ $key+1 }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->name }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->email }}</td>
                        <td class="py-1 px-6 uppercase">{{ $data->message }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection
