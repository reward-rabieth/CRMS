@extends('admin.layout.admin')

@section('admin')
    <div class="pt-2 px-4">
        <h4>Add new police</h4>
        <span>Please enter details for new polic</span>
        <hr>
    </div>
    <div class="card mx-4 my-4">

        <div class="card-body px-4">
            <h4>Police details</h4>
            <form class="my-4" method="POST" action="{{ route('admin.police.store') }}">
                @csrf
                <div class="form-group">
                    <label for="stationName">Full Name</label>
                    <input type="text" value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control" name="name" id="stationName" aria-describedby="textHelp" placeholder="Enter name" autocomplete="false">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="policeId">Police ID</label>
                    <input type="text" value="{{ old('policeId') }}" class="@error('policeId') is-invalid @enderror form-control" name="policeId" id="policeId" aria-describedby="textHelp" placeholder="Enter policeId">
                    @error('policeId')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" value="{{ old('gender') }}" class="@error('gender') is-invalid @enderror form-control" name="gender" id="gender" aria-describedby="textHelp" placeholder="Enter gender">
                    @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" value="{{ old('age') }}" class="@error('age') is-invalid @enderror form-control" name="age" id="age" aria-describedby="textHelp" placeholder="Enter age">
                    @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                @if (session('status'))
                    <div class="alert alert-success my-2">
                        {{ session('status') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>

    </div>
@endsection
