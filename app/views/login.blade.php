
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Bienvenido!</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

          {{ Form::open(array('url' => 'login', 'class' => 'form-signin')) }}

        <h2 class="form-signin-heading">Bienvenido</h2>
        <p>
          {{ $errors->first('email') }}
          {{ $errors->first('password') }}
        </p>
       
      {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}
      {{ Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control')) }}
       
  {{ Form::submit('Enviar', array('class' => 'btn btn-lg btn-primary btn-block')) }}</p>
  {{ Form::close() }}
        

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
