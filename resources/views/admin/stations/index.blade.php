@extends('admin.layout.admin')

@section('admin')
    <div class="container-fluid">

        <table class="table">
            <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Code</th>
                <th scope="col">District</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stations as $station)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $station->name }}</td>
                    <td>{{ $station->code }}</td>
                    <td>{{ $station->district }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
