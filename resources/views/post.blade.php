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
					@if (session('role') == 3)
						<a href="../allprofiles"><span class="menuItems-item">All Profiles</span></a>
					@endif
					@if(session('role') != 2) <!--роль 2 это забаненый пользователь-->
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
				<div class="head__back"><a href="../home/1">Back &gt</a></div>
				<h1>{{$post->dish}}</h1>
			</header>
			<div class="content__ingredients">
				<h3>Ingredients</h3>
				<?php
				$products = explode(',', $post->ingredients);//разбивает ингредиенты на каждый ингредиент
				$products[0] = ' '.$products[0];
				for ($i = 0; $i < count($products); $i++)
				{
					try
					{
						//разбивает ингредиет на количество и продукт
						list($error,$count,$ingredient) = explode(' ', $products[$i]);
				?>
				<div class="ingredients__item">
					<span class="ingredient">{{$ingredient}}</span>
					<span class="count">{{$count}}</span><br>
				</div>
					<?php }
					catch (Exception $e)
					{
					?>
						<div class="ingredients__item">
							<span class="ingredient">{{$products[$i]}}</span>
							<span class="count"></span><br>
						</div>
					<?php }
				}
				?>
			</div>
			<div class="content__image"><img src="../{{$post->image}}" width="670" height="455"></div><div class="content__directions">
				<h3>Directions</h3>
				<span class="content__recipe">{{$post->recipe}}</span>
			</div>
		</div>
	</div>
</body>