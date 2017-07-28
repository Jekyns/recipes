<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../public/css/index.css">
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
	$avatar = session('avatar');
	?>

	@if(isset($user))<!--если нам передают человека которого нам нужно отобразить -->
        <h3>Profile</h3>
		@if ($user['avatar'])
			<?php $avatar='../'.$user['avatar']?>
			<img src = {{$avatar}}>
		@endif
		@else
		<h3>Your profile</h3>
		@if (session('avatar'))
		<img src = {{$avatar}}>
		@endif
	@endif
	
	@if(isset($user))
		<?php 
            $login = $user['login'];//если администратор хочет посмотреть какого то пользователя то он передат данные этого пользователя
			$password= $user['password'];
			$email = $user['email'];
			$first_name = $user['first_name'];
			$surname = $user['surname'];
			$gender = $user['gender'];
			$mobile = $user['mobile'];
			$avatar=$user['avatar'];
		?>
	@endif
	
	<p>
		Login: {{$login}}<br>
		Password: {{$password}}<br>
		Email: {{$email}}<br>
		First name: {{$first_name}}<br>
		Surname: {{$surname}}<br>
		Gender: {{$gender}}<br>
		Mobile number: {{$mobile}}<br>
		
		@if(isset($user))
			<a href="../allprofiles">Back</a>
			<a href="../home/1">Home</a>
		@else
			<a href="../public/exit">Exit</a>
			<a href="home/1">Home</a>
		@endif
	</p>
    @if (isset($posts))
    <div>List of Posts</div>
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
 
</body>

