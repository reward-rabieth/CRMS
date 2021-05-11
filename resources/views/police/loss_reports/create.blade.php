@extends('police.layout.police')

@section('police')
    <div class="pt-2 px-4">
        <h4>LOSS REPORT</h4>
        <span>Please enter details for new report</span>
    </div>
    <div class="card mx-4 my-4">

        <div class="card-body px-4">
            <form class="my-4" method="POST" action="{{ route('police.loss-report.store') }}">
                @csrf
                <h5 class="font-weight-bold mt-3">Personal Information</h5>
                <hr>

                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" value="{{ old('firstName') }}" class="@error('firstName') is-invalid @enderror form-control" name="firstName" id="firstName" aria-describedby="textHelp" placeholder="First Name">
                            @error('firstName')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="secondName">Second Name</label>
                            <input type="text" value="{{ old('secondName') }}" class="@error('secondName') is-invalid @enderror form-control" name="secondName" id="secondName" aria-describedby="textHelp" placeholder="Second Name">
                            @error('secondName')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="dob">Date of birth</label>
                            <input type="text" value="{{ old('dob') }}" class="@error('dob') is-invalid @enderror form-control" name="dob" id="dob" aria-describedby="textHelp" placeholder="Date of birth">
                            @error('dob')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="nid">National Identity number</label>
                            <input type="text" value="{{ old('nid') }}" class="@error('nid') is-invalid @enderror form-control" name="nid" id="nid" aria-describedby="textHelp" placeholder="National Identity number">
                            @error('nid')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="text" value="{{ old('gender') }}" class="@error('gender') is-invalid @enderror form-control" name="gender" id="gender" aria-describedby="textHelp" placeholder="Gender">
                            @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h5 class="font-weight-bold mt-3">Current Personal Address</h5>
                <hr>

                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="region">Region</label>
                            <input type="text" value="{{ old('region') }}" class="@error('region') is-invalid @enderror form-control" name="region" id="region" aria-describedby="textHelp" placeholder="Region">
                            @error('region')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="district">District</label>
                            <input type="text" value="{{ old('district') }}" class="@error('district') is-invalid @enderror form-control" name="district" id="district" aria-describedby="textHelp" placeholder="District">
                            @error('district')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="residence">Residence</label>
                            <input type="text" value="{{ old('residence') }}" class="@error('residence') is-invalid @enderror form-control" name="residence" id="residence" aria-describedby="textHelp" placeholder="Residence">
                            @error('residence')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" value="{{ old('email') }}" class="@error('email') is-invalid @enderror form-control" name="email" id="email" aria-describedby="textHelp" placeholder="Email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="phoneNumber">Mobile number one</label>
                            <input type="text" value="{{ old('phoneNumber') }}" class="@error('phoneNumber') is-invalid @enderror form-control" name="phoneNumber" id="phoneNumber" aria-describedby="textHelp" placeholder="Mobile number one">
                            @error('phoneNumber')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="phoneNumber2">Mobile number two</label>
                            <input type="text" value="{{ old('phoneNumber2') }}" class="@error('phoneNumber2') is-invalid @enderror form-control" name="phoneNumber2" id="phoneNumber2" aria-describedby="textHelp" placeholder="Mobile number two">
                            @error('phoneNumber2')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
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
