@extends('layouts.app')

@section('content')
    <div class="side-bar pt-5">
{{--        Navigation bar--}}
        <div class="category-wrapper">
            <div class="nav-item collapse-link" onclick="expand(event)">MANAGE STATIONS</div>
            <ul class="sub-category">
                <li><a href="">Add</a></li>
                <li><a href="">View</a></li>
            </ul>
        </div>
        <div class="nav-item"><a href="">MANAGE CRIMES</a></div>
        <div class="nav-item"><a href="">MANAGE POLICE</a></div>
        <div class="nav-item"><a href="">MANAGE CRIMINALS</a></div>
        <div class="nav-item"><a href="">MANAGE CASES</a></div>
    </div>
    <main class="main">
        @yield('admin')
    </main>

    <script>
        const expand = function (event){
            let ul = event.target.nextElementSibling;
            console.log(ul.classList.toggle('collapse'))
        }

    </script>
@endsection
