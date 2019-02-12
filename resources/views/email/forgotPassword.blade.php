<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <p>Email ini telah meminta untuk reset password</p>
    <p>Jika benar, silahkan kunjungi <a href="{{ url('/reset/'. $user->token . '/' . $user->email) }}">tautan</a> ini</p>
</body>
</html>