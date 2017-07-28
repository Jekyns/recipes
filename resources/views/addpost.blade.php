<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<style>
		span.form-group{
			opacity: 0.7;
			padding-left: 10px;
		}
		</style>
</head>
<body>

	{!! Form::open(['files' => true],array('action' => 'PostController@addpost')) !!}
	{!!Form::token()!!}
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

		<span class="form-group">Indicate the ingredients and their quantity by separating them with a comma.Example:2/3 cups all-purpose flour, 2/3 cup sugar, 1/4 cup bread flour.</span>
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