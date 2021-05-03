@extends('layouts.app')

@section('content')
    <div class="side-bar pt-5">
{{--        Navigation bar--}}
        <div class="category-wrapper">
            <div class="nav-item collapse-link d-flex align-items-center justify-content-start" >
                <ion-icon class="mr-2" name="home-outline"></ion-icon>
                <span>MANAGE STATIONS</span>
{{--                <ion-icon name="chevron-down-outline" class="chevron"></ion-icon>--}}
            </div>
            <ul class="sub-category">
                <a href="{{ route("admin.station.create") }}"><li><ion-icon class="mr-2" name="add-outline"></ion-icon> Add</li></a>
                <a href="{{ route("admin.station.index") }}"><li><ion-icon class="mr-2" name="eye-outline"></ion-icon> View</li></a>
            </ul>
        </div>
        <a href="{{ route("admin.crimes.add") }}"><div class="nav-item"><ion-icon class="mr-2" name="eye-outline"></ion-icon> MANAGE CRIMES</div></a>
        <a href="{{ route("admin.police.add") }}"><div class="nav-item"><ion-icon class="mr-2" name="people-outline"></ion-icon> MANAGE POLICE</div></a>
        <a href="{{ route("admin.case.add") }}"><div class="nav-item"><ion-icon class="mr-2" name="file-tray-stacked-outline"></ion-icon> MANAGE CASES</div></a>
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
            @yield('admin')
        </div>
    </main>

    <script>
        const expand = function (event){
            let ul = event.target.nextElementSibling;
            ul.classList.toggle('collapse')
        }
        /*const list = document.querySelectorAll(".category-wrapper .nav-item");
        Array.from(list).forEach(function (ev){
            ev.addEventListener('click',function (e){
                console.log("ev")
                    if (e.target.className === 'chevron'){
                        const  li = e.target.parentElement;
                        li.nextElementSibling.classList.toggle('collapse');
                    }
                })
        });*/
    </script>
@endsection
