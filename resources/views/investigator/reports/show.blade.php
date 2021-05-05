@extends('investigator.layout.investigator')

@section('investigator')
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
                    <span>{{ $complaint->id }}</span>
                </div>
                <div>
                    <span class="font-weight-bold">DATE:</span>
                    <span >{{ $complaint->created_at }}</span>
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


                @if (session('status'))
                    <div class="alert alert-success my-2">
                        {{ session('status') }}
                    </div>
                @endif

               <div class=" my-2">
                   <form method="post" action="{{ route('investigator.report.put',$complaint->id) }}">
                       <div class="mb-3">
                           <label for="report" class="form-label">Remarks</label>
                           <textarea class="form-control @error('report') is-invalid @enderror"  name="remarks" id="remarks" rows="5" placeholder="Investigator remarks">{{ old('remarks') }}</textarea>
                           @error('remarks')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                       @csrf
                       {{ method_field('PUT') }}

                       <div class="form-check">
                           <input class="form-check-input" type="radio" value="approve" name="status" id="Approve">
                           <label class="form-check-label" for="Approve">
                               Approve
                           </label>
                       </div>
                       <div class="form-check">
                           <input class="form-check-input" type="radio" value="deny" name="status" id="Deny" checked>
                           <label class="form-check-label" for="Deny">
                               Deny
                           </label>
                       </div>
                       <button class="btn btn-outline-success mr-2">Update report</button>

                   </form>
               </div>

            </div>
        </div>
    </div>
@endsection
