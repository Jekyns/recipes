<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../public/css/index.css">
    <style>
        .bodywarp__registration {
            height: 250px;



        }
        input[type="text"] {
            padding-right: 55px;

        }
        input[type="password"] {
            padding-right: 55px;

        }
        form {
            text-align: right;
        }
        label{
            padding-top: 10px;
            padding-bottom: 10px;
        }
        body{
            background-image: url(../public/css/images/login_bg.jpg);
            background-size: cover;
        }

    </style>
</head>
<body>
<div class="headerWrapper">
    <header id="siteHeader">
        <div class="menuItems">
            <a href="register"><span class="menuItems-item">Sign Up</span></a>
            <a href="home/1"><span class="menuItems-item">Home</span></a>
        </div>
    </header>
</div>
 <?php


 ?>
<div class="bodywarp">
    <div class="bodywarp__registration">
        <div class="bodywarp__registration-label">
            <span class="bodywarp__registration-text">Log In</span>
        </div>
            {!! Form::open(array('action' => 'LoginController@index')) !!}
            {!!Form::token()!!}
            {{ Form::label('Login: ') }}{!! Form::text('name', @$name) !!}

            {{ Form::label('Password: ') }}{!! Form::password('password') !!}

            {!! Form::submit('Log in') !!}

            {!! Form::close() !!}
    </div>
</div>
</body>