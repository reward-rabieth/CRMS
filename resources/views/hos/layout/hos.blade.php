@extends('layouts.app')

@section('content')
    <div class="side-bar pt-5">
        {{--        Navigation bar--}}
        <a href="{{ route("hos.report.index") }}"><div class="nav-item"><ion-icon class="mr-2" name="eye-outline"></ion-icon> VIEW COMPLAINTS</div></a>

        <div class="category-wrapper">
            <div class="nav-item collapse-link d-flex align-items-center justify-content-start" >
                <ion-icon class="mr-2" name="people-outline"></ion-icon>
                <span> MANAGE POLICE</span>
                {{--                <ion-icon name="chevron-down-outline" class="chevron"></ion-icon>--}}
            </div>
            <ul class="sub-category">
                <a href="{{ route("hos.police.create") }}"><li><ion-icon class="mr-2" name="add-outline"></ion-icon> Add</li></a>
                <a href="{{ route("hos.police.index") }}"><li><ion-icon class="mr-2" name="eye-outline"></ion-icon> View</li></a>
            </ul>
        </div>
        <a href="{{ route("hos.case.index") }}"><div class="nav-item"><ion-icon class="mr-2" name="file-tray-stacked-outline"></ion-icon> VIEW CASES</div></a>
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
            @yield('hos')
        </div>
    </main>

@endsection
