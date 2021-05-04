@extends('hos.layout.hos')

@section('hos')
    <div class="container-fluid">
        <h4>All complaints</h4>
        @if (session('status'))
            <div class="alert alert-success my-2">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-white">
            <tr >
                <th scope="col">#</th>
                <th scope="col">Complainant Name</th>
                <th scope="col">Complainant ID</th>
                <th scope="col">Defendant Name</th>
                <th scope="col">Defendant ID</th>
                <th scope="col">Created at</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($complaints as $complaint)
                <tr class="table-light">
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $complaint->complainantName }}</td>
                    <td>{{ $complaint->complainantNID }}</td>
                    <td>{{ $complaint->defendantName }}</td>
                    <td>{{ $complaint->defendantNID }}</td>
                    <td>{{ $complaint->created_at }}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ route('hos.report.show', $complaint->id) }}" class="btn btn-outline-primary px-3">View</a>
                        <delete route="{{ route('hos.report.destroy', $complaint->id) }}" id="{{ $complaint->id }}"></delete>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
