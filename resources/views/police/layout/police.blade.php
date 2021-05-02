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
                <li><a href=""><ion-icon class="mr-2" name="add-outline"></ion-icon> Add</a></li>
                <li><a href=""><ion-icon class="mr-2" name="eye-outline"></ion-icon> View</a></li>
            </ul>
        </div>
        <a href=""><div class="nav-item"><ion-icon class="mr-2" name="eye-outline"></ion-icon> MANAGE CRIMES</div></a>
        <a href=""><div class="nav-item"><ion-icon class="mr-2" name="people-outline"></ion-icon> MANAGE POLICE</div></a>
        <a href=""><div class="nav-item"><ion-icon class="mr-2" name="file-tray-stacked-outline"></ion-icon> MANAGE CASES</div></a>
        <a href=""><div class="nav-item"><ion-icon class="mr-2" name="exit-outline"></ion-icon> LOG OUT</div></a>
    </div>
    <main class="main">
        @yield('admin')
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
