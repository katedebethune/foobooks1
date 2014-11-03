
<!-- <form action = "{{ url('/') }}" method="POST">
</form> -->

<!-- better: includes laravel token -->
{{ Form::open(array('url' => '/')) }}
	{{ Form::label('first_name', 'First Name') }}
	{{ Form::text('first_name', 'Taylor Otwell') }}
	{{ Form::label('description', 'Description') }}
	{{ Form::textarea('description', '') }}
	{{ Form::label('secret', 'Super Secret') }}
	{{ Form::password('secret') }}
	{{ Form::label('pandas_are_cute', 'Are pandas cute?') }}
    {{ Form::checkbox('pandas_are_cute', '0', false) }}
    {{ Form::label('panda_colour', 'Pandas are?') }}
    {{ Form::radio('panda_colour', 'red', true) }} Red
    {{ Form::radio('panda_colour', 'black') }} Black
    {{ Form::radio('panda_colour', 'white') }} White
    {{ Form::select('panda_colour', array(
        'red'       => 'Red',
        'black'     => 'Black',
        'white'     => 'White'
    ), 'red') }}
    
    {{ "Multidimensional array of selects <br><br>" }}
    
    {{ Form::label('bear', 'Bears are?') }}
    {{ Form::select('bear', array(
        'Panda' => array(
            'red'       => 'Red',
            'black'     => 'Black',
            'white'     => 'White'
        ),
        'Character' => array(
            'pooh'      => 'Pooh',
            'baloo'     => 'Baloo'
        )
    ), 'black') }}
    
     {{ "Email input <br><br>" }}
    
     {{ Form::label('email', 'E-Mail Address') }}
     {{ Form::email('email', 'blah@blah.com') }}
    
     {{ "File upload <br><br>" }}
    
      {{ Form::label('avatar', 'Avatar') }}
      {{ Form::file('avatar') }}
      
      {{ "<br><br> Hidden fields <br><br>" }}
       {{ Form::hidden('panda', 'luishi') }}
       
        {{ "<br><br> Submit button <br><br>" }}
        {{ Form::submit('Save') }}
        
        {{ "<br><br> Non-Submit button <br><br>" }}
         {{ Form::button('Smile') }}
         
         {{ "<br><br> Image button <br><br>" }}
          {{ Form::image(asset('public/images/button.png', 'submit')) }}
          
          {{ "<br><br> Reset button <br><br>" }}
          {{ Form::reset('Clear') }}
{{ Form::close() }}

<!-- shows how to change laravel form defaults -->
<!-- {{ Form::open(array(
	'url' => '/',
	'method' => 'GET',
	'accept-charset' => 'ISO-8859-1'
)) }}

{{ Form::close() }} -->

<!-- {{ Form::open(array(
	'url' => '/',
	'method' => 'DELETE'
)) }} -->

{{ Form::close() }}
