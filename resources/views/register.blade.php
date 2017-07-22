<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>
        @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        @endif
<?php echo' <form action="registration"  enctype="multipart/form-data" method="POST">
    ' . csrf_field() . '
    <label>Login:</label>
    <input type="text" name="login"><br>
    <label>Password:</label>
    <input type="password" name="pass"><br>
    <label>Email:</label>
    <input type="text" name="email"><br>
    <label>First name:</label>
    <input type="text" name="first_name"><br>
    <label>Surname:</label>
    <input type="text" name="surname"><br>
    <label>Your gender:</label>
    <select name="gender">
        <option>Male</option>
        <option>Female</option>
    </select><br>
    <label>Mobile number:</label>
    <input type="tel" pattern="[0-9]{11}" name="mobile"><br>
    <label>Upload your avatar</label>
    <input type="file" name="avatar"><br>
    <input type="submit" value="Create an account" />
</form>';?>
        <a href="login">Log In</a>
        <a href="home">Home</a>
</body>