@extends('master')
@section('title', 'Trang quản trị website')

@section('content')

<div class="col-md-12 home_style">
    <p><b>Chào mừng bạn đến trang quản trị website</b></p>
    @if(isset($_SESSION['admin']))
    <p style="color:blue">
       Xin chào: {{$_SESSION['admin']}}
    </p>
    @endif
    <p>
        <a href="/logout">Thoát</a>
    </p>
</div>

@stop