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
        {!! Form::open(array('action' => 'PostController@search', 'class'=>'homePageHeader__wrapper-form')) !!}
        {!! Form::text('search', @$search) !!}
        {!! Form::submit('Search') !!}
        {!! Form::close() !!}
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
    </div>
    <div>
        <div class="siteConteiner">
            <div class="siteConteiner__content">
                @isset($allposts)
                    @foreach ($allposts as $post)
                        <div class="post">
                            <div class="post__img">
                                <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/8/8c/Borsh.jpg">-->
                                <?php $img=$post->image?>
                                <img src = {{$img}} width="550" height="455">
                            </div>
                            <div class="post__text">
                                <div class="text__dish">{{$post->dish}}</div>
                                <div class="test__ingredients">
                                    <span>
                                        <b>Ingredients:</b> 
                                        {{mb_strimwidth($post->ingredients, -0, 80, "...")}}
                                    </span>
                                </div>
                                <div class="text__recipes">
                                    <span>
                                        <b>Directions:</b> 
                                        {{mb_strimwidth($post->recipe, -0, 163, "")}} 
                                        <a href="">SEE MORE &gt;&gt;</a>
                                    </span>
                                </div>
                                <div class="text__author">
                                    Date: {{$post->created_at}} Author: 
                                    <a href="../public/profile/{{($post->id)-1}}">{{$post->user_id}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
                @empty($allposts)
                    <p>
                        Nothing found
                    </p>
                @endempty
          </div>
        </div>
    </div>
</body>