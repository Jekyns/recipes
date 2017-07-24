<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>

<?php
$login = session('login');
$password= session('password');
$email = session('email');
$first_name = session('first_name');
$surname = session('surname');
$gender = session('gender');
$mobile = session('mobile');
$avatar=session('avatar');
?>

@if(isset($user))
    <h3>Profile</h3>
    @if ($user['avatar'])
        <?php $avatar='../'.$user['avatar'];?>
        <img src ="{{url('storage\app\images\2O9Il60FQMk.jpg')}}">
    @endif

    <!-- @else
    <h3>Your profile</h3>

    @if (session('avatar'))
    <img src = {{$avatar}}>
    @endif -->

@endif

@if(isset($user))
<?php
    $login = $user['login'];
    $password= $user['password'];
    $email = $user['email'];
    $first_name = $user['first_name'];
    $surname = $user['surname'];
    $gender = $user['gender'];
    $mobile = $user['mobile'];
    $avatar = $user['avatar'];
?>
@endif
<!--
<p>
  Login: {{$login}}<br>
  Password: {{$password}}<br>
  Email: {{$email}}<br>
  First name: {{$first_name}}<br>
  Surname: {{$surname}}<br>
  Gender: {{$gender}}<br>
  Mobile number: {{$mobile}}<br>
  @if(isset($user))
    <a href="../home">Home</a>
  @else
    <a href="http://recipes/exit">Exit</a>
    <a href="../home">Home</a>
  @endif
</p> -->

</body>
