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
  
    @foreach ($post as $post)
        {!! Form::open(array('action' => array('PostController@update', $post->id))) !!}
            <div class="form-group">
                {!! 
                    Form::text('dish', 
                        $value ="$post->dish",
                        array('class'=>'form-control',
                            'placeholder'=>'Name of the dish')) 
                !!}
            </div>
            <div class="form-group">
                {!!
                    Form::text('ingredients', 
                        $value ="$post->ingredients",
                        array('class'=>'form-control',
                            'placeholder'=>'Ingredients'))
                !!}
            </div>
            <div class="form-group">
                {!!
                    Form::text('recipe', 
                        $value ="$post->recipe",
                        array('class'=>'form-control',
                            'placeholder'=>'recipe'))
                !!}
            </div>
        {!! Form::submit('Edit') !!}
        {!! Form::close() !!}
        
        {!! Form::open(array('action' => array('PostController@delete', $post->id))) !!}
        {!! Form::submit('Delete') !!}
        {!! Form::close() !!}
    @endforeach
    
</body>
    