<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Eka Pratama - Login</title>

  <!-- Custom styles for this template-->
  <link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">

        <!-- alert success-->
        @if (session('success'))
        <div class="alert alert-success">
          <span><strong>{{ session('success') }}</strong></span> 
        </div>
        @endif
        <!-- end alert -->

        <!-- alert gagal-->
        @if (session('status'))
        <div class="alert alert-danger">
          <span><strong>{{ session('status') }}</strong></span> 
        </div>
        @endif
        <!-- end alert -->
        
        <form action="{{ url('login') }}" method="post">
          <div class="form-group">
              <input type="text" name="email" class="form-control" placeholder="Email address">
              @if($errors->has('email'))
                <label for="email" class="text-danger">{{ $errors->first('email') }}</label>
              @endif
          </div>
          <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password">
              @if($errors->has('password'))
                <label for="password" class="text-danger">{{ $errors->first('password') }}</label>
              @endif
          </div>
          @csrf
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="/register">Register an Account</a>
          <a class="d-block small" href="/forgot">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->

</body>

</html>
