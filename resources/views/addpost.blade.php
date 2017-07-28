<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>

	{!! Form::open(['files' => true],array('action' => 'PostController@addpost')) !!}
	
	<div class="form-group">
		{!! 
			Form::text('dish', null,
				array('required',
				  'class'=>'form-control',
				  'placeholder'=>'Name of the dish')) 
		!!}
	</div>
	
	<div class="form-group">
		{!! 
			Form::text('ingredients', null,
				array('required',
					'class'=>'form-control',
					'placeholder'=>'Ingredients'))
		!!}
	</div>
	
	<div class="form-group">
		{!! 
			Form::textarea('recipe', null,
				array('required',
					'class'=>'form-control',
					'placeholder'=>'Your recipe')) 
		!!}
		{!! Form::file('image') !!}
	</div>

	{!! Form::submit('Post recipe') !!}
	{!! Form::close() !!}

</body>