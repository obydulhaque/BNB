<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Login</title>

    <!--Core CSS -->
    <link href="{{URL::to('/')}}/assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{URL::to('/')}}/assets/css/style.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/style-responsive.css" rel="stylesheet" />
</head>

<body class="login-body">

<div class="container">

      <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
          <h2 class="form-signin-heading">sign in now</h2>
        {{ csrf_field() }}
        <div class="login-wrap">
        <div class="user-login-info">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder=" E-mail">
                @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
           <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="help-block">
                       <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>

        </div>


            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>

            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>

            <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a>
            </div>


            </div>
    </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="{{URL::to('/')}}/assets/js/jquery.js"></script>
<script src="{{URL::to('/')}}/assets/bs3/js/bootstrap.min.js"></script>

</body>
</html>
