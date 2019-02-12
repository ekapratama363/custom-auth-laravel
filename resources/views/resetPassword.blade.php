<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Eka Pratama - Reset Password</title>

  <!-- Custom styles for this template-->
  <link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">

        <!-- alert gagal-->
        @if (session('status'))
        <div class="alert alert-danger">
          <span><strong>{{ session('status') }}</strong></span> 
        </div>
        @endif
        <!-- end alert -->
        
        <form action="{{ url('reset') }}" method="post">
          <div class="form-group">
              <input type="password" name="npassword" class="form-control" placeholder="New Password" value="{{ old('npassword') }}">
              @if($errors->has('npassword'))
                <label for="npassword" class="text-danger">{{ $errors->first('npassword') }}</label>
              @endif
          </div>
          <div class="form-group">
              <input type="password" name="rpassword" class="form-control" placeholder="Retype Password" value="{{ old('rpassword') }}">
              @if($errors->has('rpassword'))
                <label for="rpassword" class="text-danger">{{ $errors->first('rpassword') }}</label>
              @endif
          </div>
              <input type="hidden" name="email" value="{{$users->email}}">
              <input type="hidden" name="token" value="{{$users->token}}">
          @csrf
          <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{url('login')}}">Login</a>
          <a class="d-block small" href="{{url('register')}}">Register an Account</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->

</body>

</html>
