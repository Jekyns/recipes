<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>
<a href="register">Sign Up</a>
<a href="login">Log In</a>

@if(session()->has('login'))
    <a href="profile">Profile</a>

    @if (session('role')==3)
        <a href="allprofiles">All Profiles</a>
    @endif
    @if(session('role')!=2) <!--���� 2 ��� ��������� ������������-->
        <a href="addpost">Post your recipe</a>
        @endif
<a href="../public/exit">Exit</a>
    @endif
</body>