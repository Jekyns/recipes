<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>
@if((session()->has('login'))&&(session('role')==3))
<div class="users">
    <table cellpadding="7" border="2" width="100%">
        <tr>
            <th>ID</th>
            <th>Login</th>
            <th>Password</th>
            <th>Email</th>
            <th>First name</th>
            <th>Surname</th>
            <th>Gender</th>
            <th>Mobile</th>
            <th>Avatar</th>
            <th>URL</th>
        </tr>
        @for ($i=0;$i<count($users);++$i)<!--пока не кончился массив всех пользователей-->
        <tr>
            <td>{{$users[$i]['id']}}</td>
            <td>{{$users[$i]['login']}}</td>
            <td>{{$users[$i]['password']}}</td>
            <td>{{$users[$i]['email']}}</td>
            <td>{{$users[$i]['first_name']}}</td>
            <td>{{$users[$i]['surname']}}</td>
            <td>{{$users[$i]['gender']}}</td>
            <td>{{$users[$i]['mobile']}}</td>
            <td>{{$users[$i]['avatar']}}</td>
            <td><a href="../public/profile/{{$i}}">View</a></td>
        </tr>
        @endfor
    </table>
    
    <a href="home">Home</a>
    
    @else
        404
    @endif
</div>
</body>