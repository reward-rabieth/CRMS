@extends('ag.layout.ag')

@section('ag')
    <div class="container-fluid">
        <div class="d-flex justify-content-center ">
            <img src="{{ url('/assets/images/logo.png') }}" alt="">
        </div>

        <div class="d-flex  my-2 justify-content-center ">
            <h2 class="font-weight-bold">CASE REPORT BOOK (RB)</h2>
        </div>

        <div class="d-flex bg-info px-2 py-2 my-2 justify-content-between ">
            <div>
                <span class="font-weight-bold">REPORT NUMBER:</span>
                <span>{{ $case->caseNumber }}</span>
            </div>
            <div>
                <span class="font-weight-bold">DATE:</span>
                <span >{{ $case->date }}</span>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5>
                    COMPLAINANT DETAILS
                </h5>
                <hr>
                <div class="row my-2">
                    <div class="col">
                        <span class="font-weight-bold">Complainant Name: </span>
                        <span>{{ $complaint->complainantName }}</span>
                    </div >

                    <div class="col">
                        <span class="font-weight-bold">Complainant NID: </span>
                        <span >{{ $complaint->complainantNID }}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span class="font-weight-bold">Complainant Address: </span>
                        <span>{{ $complaint->complainantAddress }}</span>
                    </div >

                    <div class="col">
                        <span class="font-weight-bold">Complainant Contacts: </span>
                        <span >{{ $complaint->complainantContacts }}</span>
                    </div>
                </div>

                <h5 class="mt-4">
                    DEFENDANT DETAILS
                </h5>
                <hr>
                <div class="row my-2">
                    <div class="col-4">
                        <span class="font-weight-bold">Defendant Name: </span>
                        <span>{{ $complaint->defendantName }}</span>
                    </div >

                    <div class="col-4">
                        <span class="font-weight-bold">Defendant NID: </span>
                        <span >{{ $complaint->defendantNID }}</span>
                    </div>

                    <div class="col-4">
                        <span class="font-weight-bold">Defendant NID: </span>
                        <span >{{ $complaint->defendantRelationship }}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <span class="font-weight-bold">Defendant Address: </span>
                        <span>{{ $complaint->defendantAddress }}</span>
                    </div >

                    <div class="col">
                        <span class="font-weight-bold">Complainant Contacts: </span>
                        <span >{{ $complaint->defendantContacts }}</span>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <h4>Report: </h4>
                        <hr>
                        <span>{{ $complaint->report }}</span>
                    </div >
                </div>

                @php
                    use Illuminate\Support\Facades\DB;

                    $collections = DB::table('users')
                        ->join('role_user', 'role_user.user_id', '=', 'users.id')
                        ->join('roles', 'role_user.role_id', '=', 'roles.id')
                        ->where('role_user.role_id', '=', 2)
                        ->select('users.name')
                        ->get();

                @endphp

                <div class="row my-4">
                    <div class="col bg-info">
                        <h4 class="mt-2 font-weight-bold">Fill the form:</h4>
                    </div>
                </div>



                <div class=" my-2">
                    <form method="post" action="{{ route('ag.case.put',$case->caseNumber) }}">
                        <div class="row g-3">
                            <div class="col">
                                <div class="form-group">
                                    <label for="defendantAddress">Section law</label>
                                    <input type="text" value="{{ old('sectionLaw') }}" class="@error('sectionLaw') is-invalid @enderror form-control" name="sectionLaw" id="sectionLaw" aria-describedby="textHelp" placeholder="Section law">
                                    @error('sectionLaw')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="report" class="form-label">Statement</label>
                            <textarea class="form-control @error('statement') is-invalid @enderror"  name="statement" id="statement" rows="5" placeholder="Attorney general statement">{{ old('statement') }}</textarea>
                            @error('statement')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="approve" name="status" id="Court">
                            <label class="form-check-label" for="Court">
                                Send to court
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="deny" name="status" id="Deny" checked>
                            <label class="form-check-label" for="Deny">
                                Deny
                            </label>
                        </div>

                        @if ( session('status'))
                            <div class="alert alert-success my-2">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button class="btn btn-outline-success mr-2">Update report</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
