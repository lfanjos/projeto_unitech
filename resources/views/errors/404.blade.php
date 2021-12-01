<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ooops...</title>

    <link rel="stylesheet" href="{{ asset('css/404.css') }}">
</head>
<body>

<p>HTTP: <span>404</span></p>
<code><span>pagina</span>.<em>nao_encontrada</em> = true;</code>
<code><span>if</span> (<b>voce_digitou_errado</b>) {<span>tente_novamente()</span>;}</code>
<code><span>else if (<b>erro_nosso</b>)</span> {<em>alert</em>(<i>"Lamentamos que tenha acontecido"</i>); <span>window</span>.<em>location</em> = início;}</code>
<div style="text-align: center;"><a href="/">INÍCIO</a></div>

<script src="{{ asset('js/404.js') }}"></script>
</body>
</html>
