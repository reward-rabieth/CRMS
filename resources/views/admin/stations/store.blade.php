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
            <form class="my-4">
                <div class="form-group">
                    <label for="stationName">Station Name</label>
                    <input type="text" class="form-control" id="stationName" aria-describedby="textHelp" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="stationCode">Station code</label>
                    <input type="text" class="form-control" id="stationCode" aria-describedby="textHelp" placeholder="Enter code">
                </div>
                <div class="form-group">
                    <label for="stationDistrict">Station district</label>
                    <input type="text" class="form-control" id="stationDistrict" aria-describedby="textHelp" placeholder="Enter district">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
@endsection
