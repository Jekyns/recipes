<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../../public/css/index.css">
</head>
<body>
	<div class="headerWrapper">
		<header id="siteHeader">
			<div class="menuItems">
				@if(!session()->has('login'))
					<a href="../register"><span class="menuItems-item">Sign Up</span></a>
					<a href="../login"><span class="menuItems-item">Log In</span></a>

				@endif
				@if(session()->has('login'))
					<a href="../profile"><span class="menuItems-item">Profile</span></a>

					@if (session('role')==3)
						<a href="../allprofiles"><span class="menuItems-item">All Profiles</span></a>
					@endif
					@if(session('role')!=2) <!--роль 2 это забаненый пользователь-->
						<a href="../addpost"><span class="menuItems-item">Post your recipe</span></a>
					@endif
					<a href="../../public/exit"><span class="menuItems-item">Exit</span></a>
				@endif
			</div>
		</header>
	</div>

	<div class="siteConteiner">
		<div class="siteConteiner__content">
			<header class="content__head">
				<h1>Potate</h1>
			</header>
			<div class="content__ingredients">
				<h3>Ingredients</h3>
				<div class="ingredients__item">
					<span class="ingredient">potate</span>
					<span class="count">1</span><br>
				</div>
				<div class="ingredients__item">
					<span class="ingredient">picolini</span>
					<span class="count">2</span>
				</div>
			</div>
			<div class="content__image">
			<img src="../../storage/app/images/posts/Depositphotos_44100665_l-2015_1444918558.jpg" width="670" height="455">
			</div>
			<div class="content__directions">
				<h3>Directions</h3>
				<span>{{$post->recipe}}</span>
			</div>
		</div>
	</div>
</body>