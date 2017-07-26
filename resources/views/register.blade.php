<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../public/css/index.css">
    <style>
        .bodywarp__registration {
            border: 7px groove #e49d41;
            border-radius: 30px;
        }

        body{
            background-image: url(../public/css/images/registration_bg.jpg);
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="headerWrapper">
    <header id="siteHeader">
        <div class="menuItems">
            <a href="login"><span class="menuItems-item">Log In</span></a>
            <a href="home"><span class="menuItems-item">Home</span></a>
        </div>
    </header>
</div>

        @if(count($errors)>0)
            <div class="errors">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
                </div>
        @endif
        <div class="bodywarp">
            <div class="bodywarp__registration">
                <div class="bodywarp__registration-label">
                    <span class="bodywarp__registration-text">Sing Up</span>
                </div>
<?php echo' <form action="registration"  enctype="multipart/form-data" method="POST" class="bodywarp__registration-form">
    ' . csrf_field() . '
    <label>Login:</label>
    <input type="text" name="login" class ="registration-input"><br>
    <label>Password:</label>
    <input type="password" name="pass" class ="registration-input"><br>
    <label>Email:</label>
    <input type="text" name="email" class ="registration-input"><br>
    <label>First name:</label>
    <input type="text" name="first_name" class ="registration-input"><br>
    <label>Surname:</label>
    <input type="text" name="surname" class ="registration-input"><br>
    <label>Your gender:</label>
    <select name="gender" class ="registration-input">
        <option>Male</option>
        <option>Female</option>
    </select><br>
    <label>Mobile number:</label>
    <input type="tel" pattern="[0-9]{11}" name="mobile" class ="registration-input"><br>
    <label id="input__label-avatar">Upload your avatar</label>
    <input type="file" name="avatar" class ="registration-input"><br>
    <input type="submit" value="Create an account" class ="input__button" />
</form>';?>
                </div>
            </div>
</body>