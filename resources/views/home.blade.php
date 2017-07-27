<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
<div class="headerWrapper">
<header id="siteHeader">
    <div class="menuItems">
        @if(!session()->has('login'))
        <a href="register"><span class="menuItems-item">Sign Up</span></a>
        <a href="login"><span class="menuItems-item">Log In</span></a>

        @endif
        @if(session()->has('login'))
            <a href="profile"><span class="menuItems-item">Profile</span></a>

            @if (session('role')==3)
                <a href="allprofiles"><span class="menuItems-item">All Profiles</span></a>
            @endif
            @if(session('role')!=2) <!--роль 2 это забаненый пользователь-->
                <a href="addpost"><span class="menuItems-item">Post your recipe</span></a>
                @endif
        <a href="../public/exit"><span class="menuItems-item">Exit</span></a>
            @endif
    </div>
</header>
</div>
<div class="homePageHeader">
    <div class="homePageHeader__wrapper">
        <div class="social">
            <div class="socical__item">
                <div class="socical__item-facebook">
                    <a href="">facebook</a>
                </div>
            </div>
            <div class="socical__item">
                <div class="socical__item-instagram">
                    <a href="">instagram</a>
                </div>
            </div>
            <div class="socical__item">
                <div class="socical__item-twitter">
                    <a href="">twitter</a>
                </div>
            </div>
            <div class="socical__item">
                <div class="socical__item-github">
                    <a href="https://github.com/Jekyns/recipes">github</a>
                </div>
            </div>
        </div>
        <h1>Recipes</h1>
    </div>
</div>
    <div>
        @foreach ($allposts as $post)
            <p>{{$post->dish}}</p>
            <p>Author: {{$post->user_id}}</p>  
            <p>Ingredients: {{$post->ingredients}}</p>
            <p>{{$post->image}}</p>
            <p>Recipe: {{$post->recipe}}</p>
            <br>
        @endforeach
    </div>
</body>