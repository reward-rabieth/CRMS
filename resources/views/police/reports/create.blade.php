@extends('police.layout.police')

@section('police')
    <div class="pt-2 px-4">
        <h4>REPORT BOOK (RB)</h4>
        <span>Please enter details for new report</span>
    </div>
    <div class="card mx-4 my-4">

        <div class="card-body px-4">
            <h5 class="font-weight-bold">Police details </h5>

            <form class="my-4" method="POST" action="{{ route('police.report.store') }}">
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

                <h5 class="font-weight-bold mt-3">Complainant details</h5>
                <hr>


                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="complainantName">Name of complainant</label>
                            <input type="text" value="{{ old('complainantName') }}" class="@error('complainantName') is-invalid @enderror form-control" name="complainantName" id="complainantName" aria-describedby="textHelp" placeholder="Full name">
                            @error('complainantName')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="complainantNID">National ID number of complainant</label>
                            <input type="text" value="{{ old('complainantNID') }}" class="@error('complainantNID') is-invalid @enderror form-control" name="complainantNID" id="complainantNID" aria-describedby="textHelp" placeholder="Eg. 2321233312">
                            @error('complainantNID')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="complainantAddress">Complainant address</label>
                            <input type="text" value="{{ old('complainantAddress') }}" class="@error('complainantAddress') is-invalid @enderror form-control" name="complainantAddress" id="complainantAddress" aria-describedby="textHelp" placeholder="Enter address">
                            @error('complainantAddress')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="complainantContacts">Complainant contacts</label>
                            <input type="text" value="{{ old('complainantContacts') }}" class="@error('complainantContacts') is-invalid @enderror form-control" name="complainantContacts" id="complainantContacts" aria-describedby="textHelp" placeholder="Eg. 2321233312">
                            @error('complainantContacts')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h5 class="font-weight-bold mt-3">Defendant details</h5>
                <hr>

                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="defendantName">Name of defendant</label>
                            <input type="text" value="{{ old('defendantName') }}" class="@error('defendantName') is-invalid @enderror form-control" name="defendantName" id="defendantName" aria-describedby="textHelp" placeholder="Full name">
                            @error('defendantName')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="defendantNID">National ID number of complainant</label>
                            <input type="text" value="{{ old('defendantNID') }}" class="@error('defendantNID') is-invalid @enderror form-control" name="defendantNID" id="defendantNID" aria-describedby="textHelp" placeholder="Eg. 2321233312">
                            @error('defendantNID')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="defendantRelationship">Relation with accused</label>
                            <input type="text" value="{{ old('defendantRelationship') }}" class="@error('defendantRelationship') is-invalid @enderror form-control" name="defendantRelationship" id="defendantRelationship" aria-describedby="textHelp" placeholder="Eg. Friend, sister etc.">
                            @error('defendantRelationship')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="defendantAddress">Defendant address</label>
                            <input type="text" value="{{ old('defendantAddress') }}" class="@error('defendantAddress') is-invalid @enderror form-control" name="defendantAddress" id="defendantAddress" aria-describedby="textHelp" placeholder="Enter address">
                            @error('defendantAddress')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="defendantContacts">Defendant contacts</label>
                            <input type="text" value="{{ old('defendantContacts') }}" class="@error('defendantContacts') is-invalid @enderror form-control" name="defendantContacts" id="defendantContacts" aria-describedby="textHelp" placeholder="Eg. 2321233312">
                            @error('defendantContacts')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="report" class="form-label">Report</label>
                    <textarea class="form-control @error('report') is-invalid @enderror "  name="report" id="report" rows="5" placeholder="Report details">{{ old('report') }}</textarea>
                    @error('report')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                @if ( session('status'))
                    <div class="alert alert-success my-2">
                        {{ session('status') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>

    </div>
@endsection
