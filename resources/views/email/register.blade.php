<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <p>Terimakasih telah mendaftar!</p>
    <p>Akun Kamu telah dibuat, kamu bisa login setelah mengaktifkan akun dengan menekan <a href="{{ url('/verify/'. $user->token . '/' . $user->email) }}">Link</a> ini </p>
</body>
</html>