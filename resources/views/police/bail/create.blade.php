@extends('police.layout.police')

@section('police')
    <div class="container-fluid">
        <h2 class="text-center">POLICE BAIL ACT NO 15 OF 1980</h2>
        <span>File No: {{ $case->caseNumber }}</span>

        <h5 class="text-center">OBLIGATOR INFORMATION</h5>

        <form action="">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="@error('name') is-invalid @enderror form-control" name="name" id="name" aria-describedby="textHelp" placeholder="Enter name" autocomplete="false">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Gender:</label>
                        <input type="text" class="@error('gender') is-invalid @enderror form-control" name="gender" id="gender" aria-describedby="textHelp" placeholder="Gender" autocomplete="false">
                        @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="id">National ID:</label>
                        <input type="text" class="@error('name') is-invalid @enderror form-control" name="id" id="id" aria-describedby="textHelp" placeholder="National Id" autocomplete="false">
                        @error('id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="@error('name') is-invalid @enderror form-control" name="name" id="name" aria-describedby="textHelp" placeholder="Enter name" autocomplete="false">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="phoneNumber">Phone number:</label>
                        <input type="text" class="@error('phoneNumber') is-invalid @enderror form-control" name="phoneNumber" id="phoneNumber" aria-describedby="textHelp" placeholder="Phone number" autocomplete="false">
                        @error('phoneNumber')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               <div class="col">
                   <div class="form-group">
                       <label for="relationship">Relationship:</label>
                       <input type="text" class="@error('relationship') is-invalid @enderror form-control" name="relationship" id="relationship" aria-describedby="textHelp" placeholder="Relationship with suspect" autocomplete="false">
                       @error('relationship')
                       <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                   </div>
               </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="@error('address') is-invalid @enderror form-control" name="name" id="name" aria-describedby="textHelp" placeholder="Address" autocomplete="false">
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="amount">Bond Amount:</label>
                        <input type="text" class="@error('amount') is-invalid @enderror form-control" name="name" id="name" aria-describedby="textHelp" placeholder="Amount" autocomplete="false">
                        @error('amount')
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
            <button type="submit" class="btn btn-primary">Process</button>
        </form>
    </div>
@endsection
