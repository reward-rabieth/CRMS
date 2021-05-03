@extends('admin.layout.admin')

@section('admin')
    <div class="container-fluid">
        <h4>All stations</h4>
        @if (session('status'))
            <div class="alert alert-success my-2">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Code</th>
                <th scope="col">District</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($stations as $station)
                <tr class="table-light">
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $station->name }}</td>
                    <td>{{ $station->code }}</td>
                    <td>{{ $station->district }}</td>
                    <td>
                        <delete route="{{ route('admin.station.destroy', $station->id) }}" id="{{ $station->id }}" ></delete>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
