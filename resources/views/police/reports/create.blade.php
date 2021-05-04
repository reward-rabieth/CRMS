@extends('police.layout.police')

@section('police')
    <div class="pt-2 px-4">
        <h4>Add new report</h4>
        <span>Please enter details for new report</span>
    </div>
    <div class="card mx-4 my-4">

        <div class="card-body px-4">
            <h5 class="font-weight-bold">Police details</h5>
            <form class="my-4" method="POST" action="{{ route('admin.police.store') }}">
                @csrf
                <div class="form-group">
                    <label for="stationName">Police Name</label>
                    <input type="text" value="{{ auth()->user()->name }}" class="@error('name') is-invalid @enderror form-control" name="name" id="stationName" aria-describedby="textHelp" placeholder="Enter name" autocomplete="false" disabled>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="policeId">Police ID</label>
                    <input type="text" value="{{ auth()->user()->username }}" class="@error('policeId') is-invalid @enderror form-control" name="policeId" id="policeId" aria-describedby="textHelp" placeholder="Enter policeId" disabled>
                    @error('policeId')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="age">Date</label>
                    <input type="text" value="{{  date('Y-m-d H:i:s') }}" class="@error('age') is-invalid @enderror form-control" name="age" id="age" aria-describedby="textHelp" placeholder="Enter date" disabled>
                    @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <h5 class="font-weight-bold">Complaint details</h5>
                <hr>

                <div class="form-group">
                    <label for="age">Name of complaint</label>
                    <input type="text" value="{{ old('age') }}" class="@error('age') is-invalid @enderror form-control" name="age" id="age" aria-describedby="textHelp" placeholder="Full name">
                    @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="age">Name of accused</label>
                            <input type="text" value="{{ old('age') }}" class="@error('age') is-invalid @enderror form-control" name="age" id="age" aria-describedby="textHelp" placeholder="Full name">
                            @error('age')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="age">Relation with accused</label>
                            <input type="text" value="{{ old('age') }}" class="@error('age') is-invalid @enderror form-control" name="age" id="age" aria-describedby="textHelp" placeholder="Eg. Friend, sister etc.">
                            @error('age')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="age">Address</label>
                    <input type="text" value="{{ old('age') }}" class="@error('age') is-invalid @enderror form-control" name="age" id="age" aria-describedby="textHelp" placeholder="Enter address">
                    @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Report</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Report details"></textarea>
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
