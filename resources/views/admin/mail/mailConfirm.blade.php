<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/img/favicon.png') }}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @component('mail::message')
       <div class="container text-center my-3">
        <h1>Transação efetuada com sucesso!</h1>
        <h2 class="my-3">Olá <b>{{ $user }}</b></h2>
        <img src="https://lsantosdevbucket2.s3.amazonaws.com/favicon.png" alt="logo">
    @component('mail::panel')
            Você fez uma transação para <b>{{ $userSender }}</b> e viemos te avisar
            que tudo correu como o esperado, ele já tem o dinheiro na conta.
        </div>
    @endcomponent


    @endcomponent
</body>
</html>


