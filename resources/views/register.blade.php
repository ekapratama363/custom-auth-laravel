<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Eka Pratama - Register</title>

  <!-- Custom styles for this template-->
  <link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">

    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        
        <!-- alert -->
        @if (session('status'))
        <div id="status" class="alert alert-success">
          <span><strong>{{ session('status') }}</strong></span> 
        </div>
        @endif
        <!-- end alert -->

        <form action="{{ url('register') }}" method="post">
          <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}">
              @if($errors->has('name'))
                <label for="name" class="text-danger">{{ $errors->first('name') }}</label>
              @endif
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                  <input type="name" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}">
                  @if($errors->has('email'))
                    <label for="email" class="text-danger">{{ $errors->first('email') }}</label>
                  @endif
              </div>
              <div class="col-md-6">
                  <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                  @if($errors->has('password'))
                    <label for="password" class="text-danger">{{ $errors->first('password') }}</label>
                  @endif
              </div>
            </div>
          </div>
          @csrf
          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="/login">Login Page</a>
          <a class="d-block small" href="/forgot">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="{{ url('js/jquery.min.js') }}"></script> -->

</body>

</html>
