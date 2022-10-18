<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    @if (session('erro'))
    <div>
        {{ session('erro') }}
    </div>
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" class="form-control" placeholder="Entre com seu login" required>
            <!-- <div class="valid-feedback">Válido.</div>
            <div class="invalid-feedback">Inválido.</div> -->
        </div>
        <div class="mb-3">
            <label for="password">Senha:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Entre com sua senha" required>
            <!-- <div class="valid-feedback">Válido.</div>
            <div class="invalid-feedback">Inválido.</div> -->
        </div>
        <div class="mb-3">
            <a href="{{ route('index') }}" class="text-danger" target="_blank">Não possuo cadastro</a>
        </div>

        <div class="mb-3">
            <input name="submit" id="botao" type="submit" value="Login" />
        </div>

    </form>
</body>

</html>