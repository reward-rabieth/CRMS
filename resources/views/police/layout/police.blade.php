@extends('layouts.app')

@section('content')
    <div class="side-bar pt-5">
        {{--        Navigation bar--}}
        <div class="category-wrapper">
            <div class="nav-item collapse-link d-flex align-items-center justify-content-start" >
                <ion-icon class="mr-2" name="home-outline"></ion-icon>
                <span>MANAGE REPORTS</span>
                {{--                <ion-icon name="chevron-down-outline" class="chevron"></ion-icon>--}}
            </div>
            <ul class="sub-category">
                <a href="{{ route("police.report.create") }}"><li><ion-icon class="mr-2" name="add-outline"></ion-icon> Add</li></a>
                <a href="{{ route("police.report.index") }}"><li><ion-icon class="mr-2" name="eye-outline"></ion-icon> View</li></a>
            </ul>
        </div>
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
            @yield('police')
        </div>
    </main>


@endsection
