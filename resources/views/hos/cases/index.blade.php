@extends('hos.layout.hos')

@section('hos')
    <div class="container-fluid">
        <h4>All cases</h4>
        @if ( session('status'))
            <div class="alert alert-success my-2">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-white">
            <tr >
                <th scope="col">#</th>
                <th scope="col">Suspect Name</th>
                <th scope="col">Created at</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach( $cases as $case)
                <tr class="table-light">
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $case->suspectName }}</td>
                    <td>{{ $case->date }}</td>
                    <td>{{ $case->status }}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ route('hos.case.show', $case->caseNumber) }}" class="btn btn-outline-primary px-3">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
