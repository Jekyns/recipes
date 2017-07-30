<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="http://inoproject/recipes/public/css/index.css">
</head>
<body>
<div class="headerWrapper">
	<header id="siteHeader">
		<div class="menuItems">
			@if(isset($user))
				<a href="../allprofiles"><span class="menuItems-item">Back</span></a>
				<a href="../home/1"><span class="menuItems-item">Home</span></a>
			@else
				<a href="home/1"><span class="menuItems-item">Home</span></a>
				<a href="../public/exit"><span class="menuItems-item">Exit</span></a>
			@endif
		</div>
	</header>
</div>
<div class="profile">
	<?php
	$login = session('login');
	$password = session('password');
	$email = session('email');
	$first_name = session('first_name');
	$surname = session('surname');
	$gender = session('gender');
	$mobile = session('mobile');
	$avatar = session('avatar');
	?>

	@if (isset($user))<!--если нам передают человека которого нам нужно отобразить -->
		@if ($user['avatar'])
			<?php $avatar='../'.$user['avatar']?>
				<div class="profile__avatar">
					<img class="profile__avatar-img" src = "{{$avatar}}">
				</div>
		@endif
		@else
			@if (session('avatar'))
				<div class="profile__avatar">
		<img class="profile__avatar-img" src = "{{$avatar}}">
				</div>
		@endif
	@endif
	@if (isset($user))
		<?php 
            $login = $user['login'];//если администратор хочет посмотреть какого то пользователя то он передат данные этого пользователя
			$password = $user['password'];
			$email = $user['email'];
			$first_name = $user['first_name'];
			$surname = $user['surname'];
			$gender = $user['gender'];
			$mobile = $user['mobile'];
			$avatar = $user['avatar'];
		?>
	@endif
	<div class="profile__info">
		<span class="profile__info-item">Login: {{$login}}<br></span>
		<span class="profile__info-item">Password: {{$password}}<br></span>
		<span class="profile__info-item">Email: {{$email}}<br></span>
		<span class="profile__info-item">First name: {{$first_name}}<br></span>
		<span class="profile__info-item">Surname: {{$surname}}<br></span>
		<span class="profile__info-item">Gender: {{$gender}}<br></span>
		<span class="profile__info-item">Mobile number: {{$mobile}}<br></span>
	</div>
    @if (isset($posts))
    <h2>My Posts</h2>
    <div>
        <table cellpadding="7" border="2" width="100%">
            <tr>
                <th>#</th>
                <th>Dish</th>
                <th>Image</th>
                <th>Ingredients</th>
                <th>Recipe</th>
                <th>Edit</th>
            </tr>
            <?php  $i = 1 ?>
            @foreach ($posts as $post)
                <tr>
                    <?php 
                        $img = $post->image;
                        $id = $post->id
                    ?>
                    <td>{{$i}}</td>
                    <td>{{$post->dish}}</td>
                    <td>
                    @if($img !== "")
                        <img src = {{$img}} width="100" height="100">
                    @endif
                    </td>
                    <td>{{$post->ingredients}}</td>
                    <td>{{$post->recipe}}</td>
                    <td>
                        <a href="../public/edit/{{($id)}}">Edit / Delete</a>
                    </td>
                </tr>
                <?php $i++ ?>
            @endforeach
        </table>
    </div>
   @endif
 </div>
</body>
