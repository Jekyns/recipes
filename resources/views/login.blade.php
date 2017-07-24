<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>
{!! Form::open(array('action' => 'LoginController@index')) !!}

Login: {!! Form::text('name', @$name) !!}

Password:  {!! Form::password('password') !!}

{!! Form::submit('Log in') !!}

{!! Form::close() !!}
<a href="register">Sign Up</a>
</body>
