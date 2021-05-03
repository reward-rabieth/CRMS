@extends('admin.layout.admin')

@section('admin')
    <div class="container-fluid">
        <h4>All polices</h4>
        @if (session('status'))
            <div class="alert alert-success my-2">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-white">
            <tr >
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Police Id</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($polices as $police)
                <tr class="table-light">
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $police->name }}</td>
                    <td>{{ $police->username }}</td>
                    <td>{{ $police->gender }}</td>
                    <td>{{ $police->age }}</td>
                    <td>
                        <delete route="{{ route('admin.police.destroy', $police->id) }}" id="{{ $police->id }}" ></delete>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
