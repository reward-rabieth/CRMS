@extends('admin.layout.admin')

@section('admin')
    <div class="pt-2 px-4">
        <h4>Add new station</h4>
        <span>Please enter details for new station</span>
        <hr>
    </div>
    <div class="card mx-4 my-4">

        <div class="card-body px-4">
            <h4>Station details</h4>
            <form class="my-4" method="POST" action="{{ route('admin.station.store') }}">
                @csrf
                <div class="form-group">
                    <label for="stationName">Station Name</label>
                    <input type="text" value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control" name="name" id="stationName" aria-describedby="textHelp" placeholder="Enter name" autocomplete="false">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stationCode">Station code</label>
                    <input type="text" value="{{ old('code') }}" class="@error('code') is-invalid @enderror form-control" name="code" id="stationCode" aria-describedby="textHelp" placeholder="Enter code">
                    @error('code')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stationDistrict">Station district</label>
                    <input type="text" value="{{ old('district') }}" class="@error('district') is-invalid @enderror form-control" name="district" id="stationDistrict" aria-describedby="textHelp" placeholder="Enter district">
                    @error('district')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                @if (session('status'))
                    <div class="alert alert-success my-2">
                        {{ session('status') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
@endsection
