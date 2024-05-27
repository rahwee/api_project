<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased">
        Can your Laravel app send emails yet? 😉 
        Mailtrap
        <h1>Welcome, {{ $name }}</h1>
        <p>Please click the link below to verify your email address:</p>
        <a href="{{ $verification_url }}">Verify Email</a>
    </body>
</html>