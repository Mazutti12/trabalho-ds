<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <form name="registration" action="{{ route('cadastro') }}" method="post">
        @csrf
        <div class="row g-3">
            <div class="col-12">
                <label for="name" class="form-label">Nome </label>
                <input type="text" class="form-control" name="name" id="name" placeholder="João da Silva" required>
                <!-- <div class="invalid-feedback">
                    Nome inteiro.
                </div> -->
            </div>

            <div class="col-12">
                <label for="login" class="form-label">Login</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" name="login" id="login" placeholder="joanzinho06" required>
                    <!-- <div class="invalid-feedback">
                        Crie um login.
                    </div> -->
                </div>
            </div>

            <div class="col-12">
                <label for="password" class="form-label">Crie uma senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="********" onkeyup='check();' required>
                <!-- <div class="invalid-feedback">
                                Por favor, crie sua senha.
                            </div> -->
            </div>
            <div class="col-12">
                <label for="password" class="form-label">Confirme sua senha</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="********" onkeyup='check();' required>
                <!-- <div class="invalid-feedback">
                                Por favor, confirme sua senha.
                            </div> -->
                <span id='message'></span>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-danger" name="submit" value="Register">Criar meu Cadastro</button>
            </div>
        </div>
    </form>
</body>

</html>