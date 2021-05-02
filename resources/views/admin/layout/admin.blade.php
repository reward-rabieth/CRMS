@extends('layouts.app')

@section('content')
    <div class="side-bar pt-5">
{{--        Navigation bar--}}
        <ul>
            <li>
                <a href="">MANAGE STATIONS</a>
            </li>
            <li>
                <a href="">MANAGE CRIMES</a>
            </li>
            <li>
                <a href="">MANAGE POLICE</a>
            </li>
            <li>
                <a href="">MANAGE CRIMINALS</a>
            </li>
            <li>
                <a href="">MANAGE CASE</a>
            </li>
        </ul>
    </div>
    <main class="main">
        @yield('admin')
    </main>
@endsection
