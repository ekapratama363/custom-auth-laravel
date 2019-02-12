<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Eka Pratama - Forgot Password</title>

  <!-- Custom styles for this template-->
  <link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
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
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form action="{{ url('forgot') }}" method="post">
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter email address" autofocus="autofocus">
            @if($errors->has('email'))
              <label for="email" class="text-danger">{{ $errors->first('email') }}</label>
            @endif
          </div>
          @csrf
          <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ url('register') }}">Register an Account</a>
          <a class="d-block small" href="{{ url('login') }}">Login Page</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

</body>

</html>
