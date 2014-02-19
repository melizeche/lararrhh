@extends('master')

@section('titulo')
Usuario nuevo
@stop
 
@section('contenido')
 {{ Form::open(array('url' => 'newuser', 'class' => 'form-signin')) }}

        <h2 class="form-signin-heading">Ingresa los datos</h2>
        <p>
          {{ $errors->first('email') }}
          {{ $errors->first('password') }}
          {{ Session::get('mens')}}
        </p>
       
       {{ Form::text('nombre', Input::old('email'), array('placeholder' => 'Nombre', 'class' => 'form-control')) }}
       {{ Form::text('user', Input::old('email'), array('placeholder' => 'Nombre de usuario', 'class' => 'form-control')) }}
       {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}
        {{ Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control')) }}
       
  {{ Form::submit('Enviar', array('class' => 'btn btn-lg btn-primary btn-block')) }}</p>
  {{ Form::close() }}
@stop




 