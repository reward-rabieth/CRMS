@extends('layouts.app')

@section('content')
    <div class="side-bar pt-5">
        {{--        Navigation bar--}}

        <a href="{{ route("ag.case.all") }}"><div class="nav-item"><ion-icon class="mr-2" name="file-tray-stacked-outline"></ion-icon> VIEW CASES</div></a>
        <a href="{{ route("logout") }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <div class="nav-item">
                <ion-icon class="mr-2" name="exit-outline"></ion-icon>
                LOG OUT
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </a>
    </div>
    <main class="main container-fluid">
        <div class="p-2">
            @yield('ag')
        </div>
    </main>


@endsection
