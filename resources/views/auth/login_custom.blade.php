<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UniTech Manutenção - Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>
<body>

<div class="wrapper">
    <div class="container">
        <h1>Bem-vindo</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach (array_unique($errors->all()) as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form" method="post" id="form-login">
            @csrf
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="Password" name="password">
            <button type="submit" id="login-button">Login</button>
        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <img src="{{ asset('img/Eclipse-1s-200px.gif') }}" alt="loading">
</div>
<script>

    function submitForm(){
        $('#form-login').submit();
    }

    $("#login-button").click(function(event){

        event.preventDefault();

        $('.alert').fadeOut(1);
        $('form').fadeOut(500);
        $('img').fadeIn(1000);
        $('.wrapper').addClass('form-success');
        setTimeout(submitForm, 3000);
    });
</script>

<script> </script>
</body>
</html>
