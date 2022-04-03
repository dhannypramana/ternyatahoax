<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Selamat Datang, {{ $user->full_name }}</h1>
    {{ $user->username }} <br>
    {{ $user->no_telepon_wa }} <br>
    {{ $user->tgl_lahir }} <br>
    {{ $user->gender }} <br>
    {{ $user->username }} <br>
    {{ $user->email }} <br>
</body>
</html>