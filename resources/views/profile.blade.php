<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>
    
    Login: {{$user->login}}
    <br>
    Name: {{$user->first_name}}
    <br>
    Surname: {{$user->surname}}
    <br>
    Gender: {{$user->gender}}
    <br>
    Mobile: {{$user->mobile}}
    <br>
    Email: {{$user->email}}
    <br>
    
    
    
    


</body>
